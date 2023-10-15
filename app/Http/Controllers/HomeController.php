<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
            

    //ホーム画面に遷移
    public function gohome()
    {
        //一覧画面表示
        $item = Item::all();
        $item = Item::latest('updated_at')->get();

        return view('home/home',[
            "items" => $item
        ]);
    }

    //商品一覧表示
    public function homelist(Request $request)
    {   
        if(isset($_GET["word"])){
            $category = $request->input('search_category');
            $word = $request->input('word');
            $num = null;
            if($category == 'type' && $word == '野菜'){
                $num = 1;
            } elseif($category == 'type' && $word == '肉'){
                $num = 2;
            } elseif($category == 'type' && $word == '海産物'){
                $num = 3;
            } elseif($category == 'type' && $word == '果物'){
                $num = 4;
            } elseif($category == 'type' && $word == '飲料'){
                $num = 5;
            };
            if($category == 'type'){
                $homeitems = item::where($category, '=', $num)->paginate(20)->withQueryString();
            } else {
                $homeitems = item::where($category, 'LIKE', '%'.$word.'%')->paginate(20)->withQueryString();
            };
            return view('home/list', [
                'items' => $homeitems,
                'search_category' => $category,
                'word' => $word
            ]);  
        } else {
            $homeitems = item::orderBy('id', 'asc')->paginate(15);
            return view('home/list', [
                'items' => $homeitems,
                'search_category' => null,
                'word' => null
            ]);
        }
    }

    //詳細ページ表示
    public function viewdetail(Request $request)
    {
        $id = $request->input('id');
        if($item = item::find($id)){
            $item = item::find($id);
            return view('home/detail', [
                'item' => $item
            ]);
        }else{
            return back();
        }
    }

    //詳細検索ページ表示
    public function detailsearch()
    {
        return view('home/dsearch');
    }

    
}

