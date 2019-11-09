@extends('layouts.app')

@section('content')
<!-- 検索 -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">アンケート管理システム</div>
        <div class="card-body">
            <form method="GET">
                <div class="row">
                    <div class="col-md-1"><label>氏名</label></div>
                    <div class="col-md-3">
                        <input type="text" name="fullname" class="form-control" placeholder="入力してください">
                    </div>
                    <div class="col-md-1"><label>年代</label></div>
                    <div class="col-md-3">
                        <select id="select1a" name="age_id" class="form-control">
                            <option value="all" selected>全て</option>
                            @foreach ($ages as $age)
                            <option value="{{ $age->age }}" @if(old('age_id')==$age->age) selected @endif>
                                {{ $age->age }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label>性別</label>
                    </div>
                    <div class="col-md-1">
                        <input class="form-check-input" type="radio" value="3" name="gender" id="all" checked>
                        <label class="form-check-label" for="all">全て</label>
                    </div>
                    <div class="col-md-1">
                        <input class="form-check-input" type="radio" value="1" name="gender" id="men">
                        <label class="form-check-label" for="men">男性</label>
                    </div>
                    <div class="col-md-1">
                        <input class="form-check-input" type="radio" value="2" name="gender" id="women">
                        <label class="form-check-label" for="women">女性</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"><label>登録日</label></div>
                    <div class="col-md-3">
                        <input type="date" name="from" class="form-control">
                    </div>
                    <div class="col-md-1"><label>〜</label></div>
                    <div class="col-md-3">
                        <input type="date" name="until" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>メール送信許可</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-input" name="is_send_email" type="checkbox" value="4">
                        <label>許可のみ</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1"><label>キーワード</label></div>
                    <div class="col-md-3">
                        <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="mx-auto">
                        <a href="/system" class="btn btn-secondary">リセット</a>
                        <button type="submit" class="btn btn-primary">
                            検索
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>

<!-- ページネーションと削除ボタン -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <label>
                    全{{ $answers->total() }}件中
                    {{ $answers->firstItem() }}〜{{ $answers->lastItem() }}件の表示&nbsp;
                </label>
                {{ $answers->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>
<form action="" method="post">
    <div class="col-md-12">
        <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash">選択した項目を削除</i>
        </button>
    </div>
    <br>

    <!-- 一覧表示 -->
    @if (count($answers) > 0)
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row border border-bottom">
                <div class="col-md-1 mx-auto">
                    <input type="checkbox" id="category_all" name="category_all">
                    全選択
                </div>
                <div class="col-md-1">ID</div>
                <div class="col-md-2">名前</div>
                <div class="col-md-1">性別</div>
                <div class="col-md-1">年代</div>
                <div class="col-md-4">内容</div>
                <div class="col-md-1 mx-auto">&nbsp;</div>
            </div>
            <br>
            @foreach ($answers as $answer)
            <div class="row">
                <div class="col-md-1 mx-auto">
                    <input type="checkbox" class="category" value="{{ $answer->id }}">
                </div>
                <div class="col-md-1">{{ $answer->id }}</div>
                <div class="col-md-2">{{ $answer->fullname }}</div>
                <div class="col-md-1">
                    @if ($answer->gender == 0)
                    男性
                    @else
                    女性
                    @endif
                </div>
                <div class="col-md-1">{{ $answer->age_id }}</div>
                <div class="col-md-4">{{ str_limit($answer->feedback, $limit = 40, $end = '...') }}</div>
                <div class="col-md-1 mx-auto">
                    <a href="/system/{{ $answer->id }}" class="btn btn-primary">詳細</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</form>
@endif
@endsection
