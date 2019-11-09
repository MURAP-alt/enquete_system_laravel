@extends('layouts.front_app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">内容確認</div>
        <div class="card-body">
            <!-- 氏名 -->
            <div class="row">
                <div class="col-md-2"><label>氏名</label></div>
                <div class="col-md-5">{{ $fullname }}</div>
            </div>
            <br>
            <!-- 性別 -->
            <div class="row">
                <div class="col-md-2"><label>性別</label></div>
                <div class="col-md-5">
                    @if ($gender == 0)
                    男性
                    @else
                    女性
                    @endif
                </div>
            </div>
            <br>
            <!-- 年代 -->
            <div class="row">
                <div class="col-md-2"><label>年代</label></div>
                <div class="col-md-5">{{ $age_id }}</div>
            </div>
            <br>
            <!-- メールアドレス -->
            <div class="row">
                <div class="col-md-2"><label>メールアドレス</label></div>
                <div class="col-md-5">{{ $email }}</div>
            </div>
            <br>
            <!-- メール送信可否 -->
            <div class="row">
                <div class="col-md-2"><label>メール送信可否</label></div>
                <div class="col-md-5">
                    @if ($is_send_email == 1)
                    送信不可
                    @else
                    送信許可
                    @endif
                </div>
            </div>
            <br>
            <!-- ご意見 -->
            <div class="row">
                <div class="col-md-2">ご意見</div>
                <div class="col-md-5">{!! nl2br($feedback) !!}</div>
            </div>
            <br>
            <!-- ボタン -->
            <div class="row">
                <div class="col-md-2">&nbsp;</div>

                <!-- 再入力 -->
                <div class="col-md-2">
                    <button type="button" class="btn bg-secondary" onclick=history.back()>再入力</button>
                </div>

                <!-- 送信 -->
                <div class="col-md-2">
                    <form action="{{ url('complete') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <input type="hidden" name="fullname" value="{{ $fullname }}">
                        <input type="hidden" name="gender" value="{{ $gender }}">
                        <input type="hidden" name="age_id" value="{{ $age_id }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="is_send_email" value="{{ $is_send_email }}">
                        <input type="hidden" name="feedback" value="{{ $feedback }}">

                        <input type="submit" class="btn bg-primary" value="送信">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
