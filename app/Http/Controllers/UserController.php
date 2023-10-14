<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function list()
    {

        //Userテーブルに入ってるレコードをすべて取得する
        $user = User::paginate(15);
        \Log::channel('debug')->info($user);

        return view('user.list')->with([
            'user'=>$user
        ]);
    }

    //
    public function edit(Request $request)
    {
        //
        if($user = User::find($request->id)){
            $user = User::where('id','=',$request->id)->first();
            return view('user.edit')->with([
                'user'=> $user,
            ]);
        }else{
            return back();
        }

        



    }

    // 
    public function userEdit(Request $request)
    {
        $messages = [
            'name.required'=>'名前の入力は必須です。',
            'email.required'=>'メールアドレスの入力は必須です。',
            'email.unique' => 'このメールアドレスは既に登録されています。'
        ];

        $this->validate($request,[
            'name' => 'required|max:100',
            'email' =>[
                        'required',
                        'max:125',
                        'email',
                        Rule::unique('users')->ignore($request->id),
                    ],
        ],$messages);

            

        // 既存のレコードを取得して、編集してから保存する
        if(Auth::user()->id == $request->id && $request->role == 0){
            $user = User::where('id','=',$request->id)->first();
            $user ->name = $request->name;
            $user ->email = $request->email;
            $user ->role = $request->role;        
            $user ->save();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $user = User::where('id','=',$request->id)->first();
            $user ->name = $request->name;
            $user ->email = $request->email;
            $user ->role = $request->role;
            $user ->save();
            session()->flash('flash_message','更新完了');
            return redirect('/user/list');
        }
        

        
    }

    public function userDelete(Request $request)
    {
        //既存のレコードを取得して削除する
        $member = User::where('id','=',$request->id)->first();
        $member ->delete();
        session()->flash('flash_message','削除完了');
        return redirect('/user/list');
    }

}
