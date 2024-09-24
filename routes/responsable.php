<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Responsable\ResponsableController;



Route::prefix('responsable')->name('responsable.')->group(function(){

    Route::middleware([])->group(function(){
        Route::controller(ResponsableController::class)->group(function(){
            Route::get('/login','login')->name('login');
            Route::post('/login-handler','loginHandler')->name('login-handler');
            Route::get('/register','register')->name('register');
            Route::post('/create','createResponsable')->name('create');
            Route::get('/account/verify/{token}','verifyAccount')->name('verify');
            Route::get('/register-success','registerSuccess')->name('register-success');
        });
    });

    Route::middleware([])->group(function(){

        Route::controller(ResponsableController::class)->group(function(){
            Route::get('/home','home')->name('home');
            Route::post('/logout','logoutHandler')->name('logout');
        });

    });
});
