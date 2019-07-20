<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
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
        Schema::defaultStringLength(191);

        Response::macro('sucess',function ($data){
            return response()->json([
                'data'=>$data
            ]);
        });

        Response::macro('error',function ($message,$status=422,$aditional_info=[]){
            return response()->json([
                'data' => [
                'message' => $message,
                'info' => $aditional_info,
                ]
                ],$status);
        });
    }
}
