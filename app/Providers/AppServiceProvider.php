<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//文字コードでエラー対策
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //MySQLでのエラー対応：文字コード対応していなければエラー
        Schema::defaultStringLength(191);
    }
}
