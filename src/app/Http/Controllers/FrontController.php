<?php

namespace App\Http\Controllers;

use App\Age;
use App\Answer;
use Illuminate\Http\Request;
use App\Http\Requests\RuleRequest;

class FrontController extends Controller
{
    // indexのview表示
    public function index()
    {
        $ages = Age::orderBy('created_at', 'asc')->get();
        return view('front/index', ['ages' => $ages]);
    }

    // confirmのviewを表示
    public function confirm(RuleRequest $request)
    {
        if ($request->age_id == "選択してください") {
            return redirect('/')
                ->withInput()
                ->withErrors("年代を選択してください");
        }

        return view('front/confirm', [
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'age_id' => $request->age_id,
            'email' => $request->email,
            'is_send_email' => $request->is_send_email,
            'feedback' => $request->feedback
        ]);
    }

    // アンケート情報を保存
    public function save(RuleRequest $request)
    {
        $answer = new Answer;
        $answer->fullname = $request->fullname;
        $answer->gender = $request->gender;
        $answer->age_id = $request->age_id;
        $answer->email = $request->email;
        $answer->is_send_email = $request->is_send_email;
        $answer->feedback = $request->feedback;
        $answer->save();
        return view('front/complete');
    }

    public function re_enter()
    {
        return redirect('/')->withInput();
    }
}
