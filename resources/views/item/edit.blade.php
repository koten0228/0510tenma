@extends('item.layout')
@section('content')
<div class="center-block">

   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>   
   @endif


   <div class="col-xs-6 " style="margin-top:100px;">
   @if($item->img)
   <img src="data:image/png;base64,{{ $item->img }}">
   @endif
      <form action="/item/edit/{{ $item->id }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <p>No：{{ $item->id }}</p>

         カテゴリ：
         <select class="form-control" name="type">
            @foreach (Config::get('itemlist.item_list') as $key => $val)
               <option value="{{ $key }}"  @if (old('item_list' , $item->type) == $key) selected  @endif> {{ $val }}</option>
            @endforeach
         </select>


         <p>商品名：<input class="form-control" type="text" name="name" value="{{ old('name', $item->name) }}"></p>
         <p>金額：<input class="form-control" type="text" name="price" value="{{ old('price', $item->price) }}"></p>
         <p>詳細：<textarea class="form-control form-control-lg" type="text" name="detail">{{ old('detail',$item->detail )}}</textarea></p>

         ステイタス：<select class="form-control" name="status" id="{{ old('status',$item->status) }}">
            <option value="">選択してください</option>
            <option value="販売予定" {{ $item->status == "販売予定" ? 'selected' : ''}}>販売予定</option>
            <option value="予約販売" {{ $item->status == "予約販売" ? 'selected' : ''}}>予約販売</option>
            <option value="販売中" {{ $item->status == "販売中" ? 'selected' : ''}}>販売中</option>
            <option value="完売" {{ $item->status == "完売" ? 'selected' : ''}}>完売</option>
            <option value="廃盤" {{ $item->status == "廃盤" ? 'selected' : ''}}>廃盤</option>

         </select>



         <p>商品画像：
            <input type="file" name="img" accept="image/png, image/jpeg, application/pdf" value="{{ $item->img }}" >
         </p>

         <button class="btn btn-outline-primary btn-1g btn-info" type="submit" class="">更新</button>
      </form>

      <form action="/item/edit/{{ $item->id }}" method="POST">
         <button type="submit" id="delete-item-{{ $item->id}}" class="btn btn-outline-primary btn-1g btn-info" onclick='return confirm("本当に削除しますか？")'>削除</button>

         {{ csrf_field() }}
         {{ method_field('DELETE') }}


      </form>



   </div>
</div>

@endsection