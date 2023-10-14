@extends('home.navi')
@section('title', '商品管理システム | 商品詳細ページ（商品ID : {{ $item->id }}')

@section('content')
    <div class="mt-4 mx-5">
        <button type="button" class="px-4 py-2 btn-outline-secondary rounded-3" onClick="history.back();"><i class="bi bi-arrow-left"></i>  一覧へ戻る</button>
    </div>
    <div class="mx-auto" style="width: 1000px">
        <h3 class="my-4">商品詳細</h3>
        <div class="row center-block">
            <div class="detail-img col-sm-3">
                @if($item->img)    
                    <img src="data:image/png;base64,{{ $item->img }}" class="img-fluid" alt="" style="width: 100%; height:auto;">
                @else
                    <img src="/noimage.jpg" alt="noimage" style="width: 100%; height:auto;">
                @endif
            </div>
            <div class="detail-table col-sm-9 mx-auto">
                <table class="table-bordered" style="height: 350px; width: 750px">
                    <tr>
                        <th class="text-center" style="width: 15%">商品ID</th>
                        <td style="width: 35%; padding-left: 20px">{{ $item->id }}</td>
                        <th class="text-center" style="width: 15%">カテゴリ</th>
                        <td style="width: 35%; padding-left: 20px">
                            @if( $item['type'] === 1 )
                            野菜
                            @elseif( $item['type'] === 2 )
                            肉
                            @elseif( $item['type'] === 3 )
                            海産物
                            @elseif( $item['type'] === 4 )
                            果物
                            @elseif( $item['type'] === 5 )
                            飲料
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center">商品名</th>
                        <td colspan="3" style="padding-left: 20px">{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">価格</th>
                        <td style="padding-left: 20px">¥ {{ number_format($item->price) }}</td>
                        <th class="text-center">ステータス</th>
                        <td style="padding-left: 20px">{{ $item->status }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">詳細</th>
                        <td  colspan="3"  style="padding: 5px 20px">{!!nl2br(e($item->detail))!!}</td>
                    </tr>
                    <tr>
                        <th class="text-center">登録日時</th>
                        <td style="padding-left: 20px">{{ $item->created_at }}</td>
                        <th class="text-center">更新日時</th>
                        <td style="padding-left: 20px">{{ $item->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection