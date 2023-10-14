@extends('account.login_register_layout')

@section('content')
<div class="container">
        <h2 class=title>商品管理システム</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ url('account_register') }}">
            @csrf
            <div class="form-group">
                <label for="name">名前</label>
                <br>
                <input type="name" id="name" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <br>
                <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">パスワード(8文字以上)</label>
                <br>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">パスワード確認</label>
                <br>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <div>
            <button type="submit" class="button-group btn btn-primary">アカウント登録</button>
            </div>


        <a href="{{ route('login') }}" class="button-group btn btn-secondary mt-3">ログイン画面へ</a>
        </form>
    </div>

@endsection
