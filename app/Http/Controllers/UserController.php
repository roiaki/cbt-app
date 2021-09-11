<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    // 追加

class UserController extends Controller
{
    // 退会処理　物理削除
    public function userDelete() {

        // 物理削除
        if(\Auth::check()) {

            $user = User::find(\Auth::id());
            $user->delete();
    
            \Auth::logout();
    
            return redirect('/columns');
        }

    }

    // 退会確認画面
    public function delete_confirm() {
        //var_dump($user);
        return view('users.delete_confirm');
    }
}