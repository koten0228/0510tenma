<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
   //今回使うモデルを記載
use App\Models\Item;

class ItemController extends Controller
{
        //一覧画面表示
    public function index(Request $request)
    {
        $item = Item::all();

        return view('item.index', [   
            "items" => $item
        ]);
    }
    
    //登録画面表示
    public function create()
    {
        return view('item.create');
    }




    //登録フォームに入力された値をDBに保存
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|max:25',
            'price'=>'required|numeric|min:10',
            'detail' => 'required|max:500',
            'status' => 'required',
            'img' => 'nullable|file|max:50',
            
        ]);
        if(isset($request->img)){
            $img = base64_encode(file_get_contents($request->img->getRealPath()));

        }else{
            $img=null;
        }




            
        // 新規取得する
        Item::create([
            'user_id'=>1,
            'type'=>$request->type,
            'name'=>$request->name,
            'price'=>$request->price,
            'detail'=>$request->detail,
            'status'=>$request->status,
            'img'=>$img,        

        ]);

        return redirect('/item/index');
    }




    //編集画面に編集したいデータを表示
    public function edit(Request $request)
    {      


        if($item = Item::find($request->id)){
            $item = Item::find($request->id);
            return view('item.edit',[
                "item"=>$item
            ]);
        }else{
            return back();
        }
        

        
    }


    //編集画面で表示したデータを編集し保存
    public function edit_save(Request $request)
    {   
        $request->validate([
            'type' => 'required',
            'name' => 'required|max:25',
            'price'=>'required|numeric|min:10',
            'detail' => 'required|max:500',
            'status' => 'required',
            'img' => 'nullable|file|max:50',
        ]);

        if(isset($request->img)){
            $img = base64_encode(file_get_contents($request->img->getRealPath()));

        }else{
            $img=null;
        }


        $item = Item::find($request->id);

        // 新規入力情報追加したものを取得する
        $item->id = $request->id;
        $item->type = $request->type;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->detail = $request->detail;
        $item->status = $request->status;
        if(isset($request->img)){
            $item->img = $img;
        }
        

        
            // 保存（更新）
            $item->save();

        return redirect('/item/index');
    }

            // 情報を削除する
        public function destroy(Request $request,$id)
        {   
            $item = Item::find($id);

            $item->delete();
            return redirect('/item/index');
        }
    

    
    //
    public function items()
    {
        return $this->hasMany(Item::class);
    }


}
