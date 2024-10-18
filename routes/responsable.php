<?php


use App\Http\Controllers\responsable\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Responsable\ResponsableController;
use App\Http\Controllers\responsable\ClientController;
use App\Http\Controllers\responsable\DashboardController;
use App\Http\Controllers\responsable\MissionController;
use App\Http\Controllers\responsable\QuartTravailController;
use App\Http\Controllers\responsable\AffectationController;
use App\Http\Controllers\responsable\AgentController;
use App\Http\Controllers\responsable\CalendarController;
use App\Http\Controllers\responsable\DisponibiliteController;
use App\Http\Controllers\responsable\PosteController;
use App\Http\Controllers\responsable\BesponsableController;



Route::prefix('responsable')->name('responsable.')->group(function () {

    Route::middleware(['guest:responsable', 'PreventBackHistory'])->group(function () {
        Route::controller(ResponsableController::class)->group(function () {
            Route::get('/login', 'login')->name('login');
            Route::post('/login-handler', 'loginHandler')->name('login-handler');
            Route::get('/register', 'register')->name('register');
            Route::post('/create', 'createResponsable')->name('create');
            Route::get('/account/verify/{token}', 'verifyAccount')->name('verify');
            Route::get('/register-success', 'registerSuccess')->name('register-success');
            Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
            Route::post('/send-password-reset-link', 'sendPasswordResetLink')->name('send-password-reset-link');
            Route::get('/password/reset/{token}', 'showResetForm')->name('reset-password');
            Route::post('/reset-password-handler', 'resetPasswordHandler')->name('reset-password-handler');
        });
    });

    Route::middleware(['auth:responsable', 'PreventBackHistory'])->group(function () {

        Route::controller(ResponsableController::class)->group(function () {
            Route::get('/home', [HomeController::class, 'index'])->name('home');
            Route::post('/logout', 'logoutHandler')->name('logout');
            Route::get('/profile','profileView')->name('profile');
            Route::post('/change-profile-picture','changeProfilePicture')->name('change-profile-picture');
        });

        //RESPONSABLES ROUTES
        Route::prefix('besponsable')->name('besponsable.')->group(function () {

            Route::controller(BesponsableController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
                Route::get('/verify/{token}', 'verify')->name('verify');
            });
        });


        //RESPONSABLES ROUTES
        Route::prefix('agent')->name('agent.')->group(function () {

            Route::controller(AgentController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
                Route::get('/verify/{token}', 'verify')->name('verify');
            });
        });

        //CLIENTS ROUTES
        Route::prefix('client')->name('client.')->group(function () {

            Route::controller(ClientController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });


        //MISSION ROUTES
        Route::prefix('mission')->name('mission.')->group(function () {

            Route::controller(MissionController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });


        //POSTE ROUTES
        Route::prefix('poste')->name('poste.')->group(function () {

            Route::controller(PosteController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });


        //AFFECTATION ROUTES
        Route::prefix('affectation')->name('affectation.')->group(function () {

            Route::controller(AffectationController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });

        //QUART DE TRAVAIL ROUTES
        Route::prefix('quarttravail')->name('quarttravail.')->group(function () {

            Route::controller(QuartTravailController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });

        //DISPONIBILITE ROUTES
        Route::prefix('disponibilite')->name('disponibilite.')->group(function () {

            Route::controller(DisponibiliteController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });

        //CALENDAR ROUTES
        Route::prefix('calendar')->name('calendar.')->group(function () {

            Route::controller(CalendarController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
            });
        });


    });
});
