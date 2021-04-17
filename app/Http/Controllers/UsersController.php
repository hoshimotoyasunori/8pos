<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
// ==========ここから追加する==========
use Validator;
// ==========ここまで追加する==========
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // ==========ここから追加する==========
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    // ==========ここまで追加する==========
    public function show($user_id)
    {
        $user = User::where('id', $user_id)
            ->firstOrFail();
            
         // テンプレート「user/show.blade.php」を表示します。
        return view('user/show', ['user' => $user]);
    }
    public function edit()
    {
        $user = Auth::user();
            
         // テンプレート「user/edit.blade.php」を表示します。
        return view('user/edit', ['user' => $user]);
    }
    // ==========ここから追加する==========
    public function update(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , [
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
            ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $user = User::find($request->id);
        $user->name = $request->user_name;
        if ($request->user_profile_photo !=null) {
            $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $user->id . '.jpg';
        }
        $user->password = bcrypt($request->user_password);
        $user->save();

        return redirect('/users/'.$request->id);
    }
    // ==========ここまで追加する==========
}
