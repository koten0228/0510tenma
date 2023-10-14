@extends('home.navi')
@section('title', '商品管理システム | 詳細検索')

@section('content')
<div class="mt-4 mx-5">
    <button type="button" class="px-4 py-2 btn-outline-secondary rounded-3" onClick="history.back();"><i class="bi bi-arrow-left"></i>  一覧へ戻る</button>
</div>
<div class="mx-auto" style="width: 1000px">
    <h3 class="my-4">商品詳細検索</h3>
    <form action="/home/dsearchcontroll" method="get">
        <div>
            商品idで探す
            <input type="text" name="id" id="">
        </div>
        <div>
            商品名で探す
            <input type="radio" name="match" id="" value="1">部分一致
            <input type="radio" name="match" id="" value="2">完全一致
            <input type="text" name="name" id="">
        </div>
        <div>
            カテゴリで探す
            <input type="text" name="category" id="">
        </div>
        <div>
            価格で探す
            <input type="number" name="min_price" id="">円〜<input type="number" name="max-price" id="">円
        </div>        
        <button type="submit">検索  <i class="bi bi-search"></i></button>
    </form>
</div>
@endsection