@extends('layouts.front_app')
@section('content')

<!-- インクルードエラー -->
@include('common.errors')

<div class="container">
    <div class="card">
        <div class="card-header">システムへのご意見お聞かせください</div>
        <!-- アンケートフォーム -->
        <div class="card-body form-group">
            <form action="{{ url('confirm') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- 氏名入力欄 -->
                <div class="row br">
                    <label class="col-md-2">氏名<span class="text-danger">※</span></label>
                    <div class="col-md-5">
                        <input type="text" name="fullname" value="{{ old('fullname') }}" class="form-control">
                    </div>
                </div>
                <!-- 性別選択欄 -->
                <div class="row br">
                    <div class="col-md-2"><label>性別<span class="text-danger">※</span></label></div>
                    <div class="col-md-2">
                        <input class="form-check-inline" type="radio" value="0" name="gender" id="men"
                            {{ old('gender','0') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="men">男性</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-inline" type="radio" value="1" name="gender" id="women"
                            {{ old('gender') == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="women">女性</label>
                    </div>
                </div>
                <!-- 年代選択欄 -->
                <div class="row br">
                    <div class="col-md-2"><label for="select1a">年代<span class="text-danger">※</span></label></div>
                    <div class="col-md-5">
                        <select id="select1a" name="age_id" class="form-control">
                            <option selected>選択してください</option>
                            @foreach ($ages as $age)
                            <option value="{{ $age->age }}" @if(old('age_id')==$age->age) selected @endif>
                                {{ $age->age }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- メールアドレス入力欄 -->
                <div class="row br">
                    <div class="col-md-2"><label>メールアドレス<span class="text-danger">※</span></label></div>
                    <div class="col-md-5">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                </div>
                <!-- メール送信可否 -->
                <div class="row br">
                    <div class="col-md-2"><label>メール送信可否</label></div>
                    <div class="col-md-6">
                        <input type="hidden" name="is_send_email" value="1">
                        <input class="form-check-inline" name="is_send_email" type="checkbox" value="0"
                            @if(old('is_send_email')==0) checked @endif>
                        <span>登録したメールアドレスにメールを送信してもよろしいですか？</span>
                    </div>
                </div>
                <!-- ご意見入力欄 -->
                <div class="row br">
                    <div class="col-md-2"><label>ご意見</label></div>
                    <div class="col-md-5">
                        <textarea name="feedback" rows="6" class="form-control">{{ old('feedback') }}</textarea>
                    </div>
                </div>
                <!-- 確認ボタン -->
                <div class="row">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-2">
                        <input type="submit" class="btn bg-primary" value="確認">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
