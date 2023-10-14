@extends('home.navi')
@section('title', '商品管理システム | ユーザー編集')
@section('content')

        <div style="width:1500px; margin:100px auto;">
            @if (session('flash_message'))
                <div class="alert alert-success text-center">
            {{ session('flash_message') }}
                </div> 
            @endif
            <div>
            @if (count($user) >0)
            <p>全{{ $user->total() }}件中 {{  ($user->currentPage() -1) * $user->perPage() + 1}} - 
                {{ (($user->currentPage() -1) * $user->perPage() + 1) + (count($user) -1)  }}件のデータが表示されています。</p>
            @else
                <p>データがありません。</p>
            @endif 
                <table class="table table-striped mx-auto" >
                    <tr>
                        <th scope="col">ＩＤ</th>
                        <th scope="col">名前</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">権限</th>
                        <th scope="col">更新日</th>
                        <th scope="col"></th>
                    </tr>
                    @foreach($user as $value)
                    <tr>
                        <td scope="row">{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>
                            @if($value->role == 0)
                            一般
                            @else
                            管理者
                            @endif
                        </td>
                        <td>
                            @php echo date("Y-m-d",strtotime($value->updated_at)); @endphp
                        </td>
                        <td><a href="edit/{{$value->id}}">>>編集</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{ $user->links('pagination::bootstrap-4') }}
        </div>
@endsection

