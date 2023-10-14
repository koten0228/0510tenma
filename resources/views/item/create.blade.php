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

   <div class="col-xs-5" style="margin-top:10px;">
         <form action="{{ url('/item/create') }}" method="POST" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <p>カテゴリ：</p>
            <select class="form-control" name="type" >
            <option value="">選択してください</option>
               <option value="1" {{ old( 'type') == "1" ? 'selected' : ''}}>野菜</option>
               <option value="2" {{ old( 'type') == "2" ? 'selected' : ''}}>肉</option>
               <option value="3" {{ old( 'type') == "3" ? 'selected' : ''}}>海産物</option>
               <option value="4" {{ old( 'type') == "4" ? 'selected' : ''}}>果物</option>
               <option value="5" {{ old( 'type') == "5" ? 'selected' : ''}}>飲料</option>
            </select>    

            <p>商品名：<input class="form-control" type="text" name="name" value="{{ old('name') }}"></p>
            <p>金額：<input class="form-control" type="text" name="price" value="{{ old('price') }}"></p>
            <p>詳細：<textarea class="form-control form-control-lg" type="text" name="detail" >{{ old('detail') }}</textarea></p> 

            <p>ステイタス：</p>
            <select class="form-control" name="status" value="{{ old('status') }}" >
               <option value="">選択してください</option>
               <option value="販売予定" {{ old( 'status') == "販売予定" ? 'selected' : ''}}>販売予定</option>
               <option value="予約販売" {{ old( 'status') == "予約販売" ? 'selected' : ''}}>予約販売</option>
               <option value="販売中" {{ old( 'status') == "販売中" ? 'selected' : ''}}>販売中</option>
               <option value="完売" {{ old( 'status') == "完売" ? 'selected' : ''}}>完売</option>
               <option value="廃盤" {{ old( 'status') == "廃盤" ? 'selected' : ''}}>廃盤</option>
            </select>

            <div class="btnzoon">
               <label for="exampleFormControlFile1">画像ファイル</label>
               <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button class="btn btn-outline-primary btn-1g" type="submit" class="">登録</button>
         </form>
      </div>    
   </div>  
</div> 
         
@endsection