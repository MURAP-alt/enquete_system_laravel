<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Age;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $ages = Age::orderBy('created_at', 'asc')->get();
        $query = Answer::query();

        $fullname = $request->input('fullname');
        $age_id = $request->input('age_id');
        $gender = $request->input('gender');
        $from = $request->input('from');
        $until = $request->input('until');
        $is_send_email = $request->input('is_send_email');
        $keyword = $request->input('keyword');

        // 名前検索
        if (!empty($fullname)) {
            $query->where('fullname', 'like', '%' . $fullname . '%');
        }
        // 年代検索
        if (!empty($age_id)) {
            // すべての年代を選択した時
            if ($request->input('age_id') == 'all') {
                $query->where('age_id', 'like', '%代%');
            }
            // 年代を指定した場合
            else {
                $query->where('age_id', 'like', $age_id);
            }
        }
        // 性別検索
        if (!empty($gender)) {
            if ($request->input('gender') == 3) {
                $query->where('gender', '>=', 0);
            }
            if ($request->input('gender') == 1) {
                $query->where('gender', 0);
            }
            if ($request->input('gender') == 2) {
                $query->where('gender', 1);
            }
        }
        // メール可否検索
        if (!empty($is_send_email)) {
            $query->where('is_send_email', 0);
        }

        if (!empty($keyword)) {
            $query->where('feedback', 'like', '%' . $request->get('keyword') . '%')
                ->orWhere('email', 'like', '%' . $request->get('keyword') . '%');
        }

        if(!empty($from) && !empty($until)) {
            if ($request->input('from') == null or $request->input('until') == null) {
                // 値の取得とページネート
                $answers = $query->get();
                $answers = $query->paginate(10);
                return view('home', ['answers' => $answers, 'ages' => $ages]);
            }
            $query->whereBetween('created_at', [$request->get('from'), $request->get('until')]);
        }

        // 値の取得とページネート
        $answers = $query->get();
        $answers = $query->paginate(10);
        return view('home', ['answers' => $answers, 'ages' => $ages]);
    }

    // 詳細ページのviewを表示
    public function show($id)
    {
        $answer = Answer::findOrFail($id);
        return view('show', ['answer' => $answer]);
    }
    // 詳細ページから削除
    public function delete(Request $request)
    {
        Answer::findOrFail($request->id)->delete();
        return redirect('/system');
    }
}
