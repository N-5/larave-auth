<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//追加
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //userデータの取得
    public function index() {
        // dd(Auth::user());
        return view('mypage.index', ['user' => Auth::user()]);
    }

    //userデータの編集
    public function edit() {
        return view('mypage.edit', ['user' => Auth::user() ]);
    }

    //userデータの保存
    public function update(Request $request) {
        $user_form = $request->all();
        $user = Auth::user();

        //不要な_tokenの削除
        unset($user_form['_token']);

        //保存
        $user->fill($user_form)->save();

        //リダイレクト
        return redirect('mypage');
    }

    //一覧テスト
    public function show($id) {
        $user = User::find($id);
        $params = [
            'user' => $user,
        ];
        return view('user.show', $params);
    }
}
