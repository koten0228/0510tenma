@extends('account.login_register_layout')

@section('content')
<div class="container">
        <h2 class="title">商品管理システム</h2>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form method="POST" action="{{ url('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <br>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <br>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div>
            <button type="submit" class="button-group btn btn-primary">ログイン</button>
            </div>


        <a href="{{ route('register') }}" class="button-group btn btn-secondary mt-3">アカウント登録画面へ</a>
        </form>
</div>

@endsection


