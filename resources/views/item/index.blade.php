@extends('item.layout')
@section('content')


  <div class="col-xs-10 " style="margin-top:100px;"> 
    
            <p><a class="btn btn-outline-primary btn-sm" href="{{ url('/item/create') }}">新規追加</a></p>           
    
    <table class="table">
      <tr> 
        <th>No：</th>
        <th>カテゴリ</th>
        <th>商品名</th>
        <th>金額</th>
        <th>販売状況</th>
        <th>更新日時</th>  
      </tr>
      @foreach ($items as $val)
        <tr>
            <td><div>{{ $val->id}}</div></td> 
            <td>
              @if($val->type == 1)
                <p>野菜</P>
              @elseif($val->type == 2)
                <p>肉</P>
              @elseif($val->type == 3)
                <p>海産物</P>
              @elseif($val->type == 4)
                <p>果物</P>
              @elseif($val->type == 5)
                <p>飲料</P>
              @endif 
            </td>
            <td><div>{{ $val->name}}</div></td>
            <td><div>￥{{ number_format($val->price)}}</div></td>
            <td><div>{{ $val->status}}</div></td>
            <td><div>{{ $val->updated_at}}</div></td>  

            <th><a href="/item/edit/{{ $val->id }}">編集/削除</a></th>
        </tr>
      @endforeach 

    </table>
  </div> 


@endsection