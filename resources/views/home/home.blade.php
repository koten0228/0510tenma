@extends('home.navi')
@section('title', '商品管理システム | ホーム')

@section('content')
    <div style="width:1500px; margin:100px auto;">
        <p style="font-size: 25px">ようこそ！商品管理システムへ！</p>
        <h4>商品更新履歴</h4>
        <table class="table table-striped mx-auto" >
                    <tr>
                        <th scope="col">更新日時</th>
                        <th scope="col">商品ID</th>
                        <th scope="col">カテゴリ</th>
                        <th scope="col">商品名</th>
                        <th scope="col">金額</th>
                        <th scope="col">販売状況</th>
                        <th scope="col">詳細</th>
                    </tr>
                    @foreach($items as $val)
                    <tr>
                        <td scope="row">
                            <!-- @php echo date("Y-m-d",strtotime($val->updated_at)); @endphp -->
                            {{$val->updated_at}}
                        </td>
                        <td >{{$val->id}}</td>
                        <td>
                            @if( $val['type'] === 1 )
                                野菜
                                @elseif( $val['type'] === 2 )
                                肉
                                @elseif( $val['type'] === 3 )
                                海産物
                                @elseif( $val['type'] === 4 )
                                果物
                                @elseif( $val['type'] === 5 )
                                飲料
                            @endif
                        </td>
                        <td>{{$val->name}}</td>
                        <td>￥{{ number_format($val->price)}}</td>
                        <td>{{ $val->status}}</td>
                        <td><div> <a href="/home/detail?id={{ $val->id }}"><i class="bi bi-info-circle"></i></a></div></td>
                    </tr>
                    @endforeach
        </table>
    </div>
@endsection
<!-- class="mx-auto mt-5" style="width: 400px" -->