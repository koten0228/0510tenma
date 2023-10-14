@extends('home.navi')
@section('title', '商品管理システム | 商品一覧')

@section('content')
    <div>
        <h3 class="mx-4 my-4">商品一覧</h3>
    </div>
    <div class="float-end mb-5 p-2" style="width: 500px; border: 1px dashed #333333; border-radius: 5px">
        <span>▼検索</span>
        <form action="/home/list" method="get">
            <select name="search_category" id="" value="" required>
                @foreach (Config::get('list.search_list') as $key => $val)
                <option value="{{ $key }}" @if(old('search_list', $search_category) == $key) selected @endif>{{ $val }}</option>
                @endforeach
            </select>
            <input type="text" name="word" value="{{ $word }}" id="" required>
            <button type="submit">検索  <i class="bi bi-search"></i></button>
        </form>
    </div>
    <div style="width:450px; margin-left: 30px">
        @if (count($items) >0)
            <p>全{{ $items->total() }}件中 {{  ($items->currentPage() -1) * $items->perPage() + 1}} - 
                {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件のデータが表示されています。</p>
        @else
            <p>データがありません。</p>
        @endif 
    </div>
        @if(count($items)>0)
    <div class="list-table">
        <table class="table-table table-bordered mx-auto" style="width: 1000px">
            <!-- テーブルヘッダー -->
            <thread class="table-header">
                <th class="text-center" style="width: 10%">商品ID</th>
                <th class="text-center">商品名</th>
                <th class="text-center" style="width:15%">カテゴリ</th>
                <th class="text-center" style="width: 10%">価格</th>
                <th class="text-center" style="width: 10%">ステータス</th>
                <th class="text-center">詳細</th>
            </thread>

            <!-- テーブル本体 -->
            <tbody>
                @foreach($items as $item)
                <tr>
                    <!-- リスト -->
                    <td class="text-center py-2">
                        <div>{{ $item->id }}</div>
                    </td>
                    <td class="text-center">
                        <div>{{ $item->name }}</div>
                    </td>
                    <td class="text-center">
                        <div>
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
                        </div>
                    </td>
                    <td class="text-center">
                        <div>¥ {{ number_format($item->price) }}</div>
                    </td>
                    <td class="text-center">
                        <div>{{ $item->status }}</div>
                    </td>
                    <td class="text-center">
                        <div> <a href="/home/detail?id={{ $item->id }}"><i class="bi bi-info-circle"></i></a></div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <style>
            .pagination { justify-content: center; }
        </style>
        <div class="mt-3" style="justify-content: center">
            {{ $items->links('pagination::bootstrap-4') }}
        </div>
    </div>
    @endif
@endsection
