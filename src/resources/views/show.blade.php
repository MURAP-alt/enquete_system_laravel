@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">アンケート詳細</div>
        <div class="card-body">
            <!-- ID -->
            <div class="row br">
                <div class="col-md-2"><label>ID</label></div>
                <div class="col-md-5">{{ $answer->id }}</div>
            </div>
            <!-- 氏名 -->
            <div class="row br">
                <div class="col-md-2"><label>氏名</label></div>
                <div class="col-md-5">{{ $answer->fullname }}</div>
            </div>
            <!-- 性別 -->
            <div class="row br">
                <div class="col-md-2"><label>性別</label></div>
                <div class="col-md-5">
                    @if ($answer->gender == 0)
                    男性
                    @else
                    女性
                    @endif
                </div>
            </div>
            <!-- 年代 -->
            <div class="row br">
                <div class="col-md-2"><label>年代</label></div>
                <div class="col-md-5">{{ $answer->age_id }}</div>
            </div>
            <!-- メールアドレス -->
            <div class="row br">
                <div class="col-md-2"><label>メールアドレス</label></div>
                <div class="col-md-5">{{ $answer->email }}</div>
            </div>
            <!-- メール送信可否 -->
            <div class="row br">
                <div class="col-md-2"><label>メール送信可否</label></div>
                <div class="col-md-5">
                    @if ($answer->is_send_email == 1)
                    送信不可
                    @else
                    送信許可
                    @endif
                </div>
            </div>
            <!-- ご意見 -->
            <div class="row br">
                <div class="col-md-2">ご意見</div>
                <div class="col-md-5">{!! nl2br($answer->feedback) !!}</div>
            </div>
            <!-- 登録日 -->
            <div class="row br">
                <div class="col-md-2"><label>登録日</label></div>
                <div class="col-md-5">{{ $answer->created_at }}</div>
            </div>
            <!-- ボタン -->
            <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <!-- 一覧に戻る -->
                <div class="col-md-2">
                    <button type="button" class="btn bg-secondary" onclick=history.back()>一覧に戻る</button>
                </div>
                <!-- 削除 -->
                <div class="col-md-2">
                    <form action="delete/{{ $answer->id }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger"
                        onclick='return confirm("本当に削除しますか?");'>
                            <i class="fa fa-trash">削除</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
