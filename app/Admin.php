<?php

namespace App;

//Auth\Userクラスを継承してAuthenticatableとして使用
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//追加　管理ユーザー用パスワードリセット通知をモデルに設定
use App\Notifications\AdminResetPassword;

class Admin extends Authenticatable
{
    //メール機能
    use Notifiable;

    //ユーザー認証を$guardとしてadminとする
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Override default reset password
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }
}
