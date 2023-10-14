@extends('home.navi')
@section('title', '商品管理システム | ユーザー編集')
@section('content')

        <div style="width:500px; margin:100px auto">
            <h2>ユーザー情報編集画面</h2>
            <h3>ID：{{$user->id}}</h3>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="/user/userEdit" method="post">
                @csrf
                <input type="text" name="id" value="{{$user->id}}" hidden>
                <div class="form-group">
                    <label for="text">名前</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name',$user->name)}}" style="width:300px">
                </div>
                <div class="form-group">
                    <label for="text">メールアドレス</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email',$user->email)}}"style="width:300px">
                </div>
                <div class="form-group">
                    <label for="select">権限</label>
                        <select name="role" class="form-control">
                            @if($user->role == 0)
                                <option value="0" selected >一般</option>
                                <option value="1">管理者</option>
                            @else
                                <option value="0">一般</option>
                                <option value="1" selected>管理者</option>
                            @endif
                        </select>
                </div>
                <div class="d-grid gap-2 d-md-block" style="margin-top:30px;">
                    <button type="submit" class="btn btn-secondary">更新</button>
                    <a href="/user/userDelete/{{$user->id}}"><button type="button" class="btn btn-secondary">削除</button></a>
                </div>
            </form>
            @if(Auth::user()->id === $user->id)
                <p>現在ログインしているユーザーです！</p>
            @endif
        </div>
@endsection

