<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\EntiteController;
use App\Http\Controllers\FournisseurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::route('login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/reset_password', [App\Http\Controllers\HomeController::class, 'resetPassword'])->name('reset_password');
    Route::post('/reset_password', [App\Http\Controllers\HomeController::class, 'resetPasswordPost'])->name('reset_password_post');

    Route::prefix('comptes')->name('comptes.')->group(function(){
        Route::get('/', [CompteController::class, 'index'])->name('index');
        Route::get('/create', [CompteController::class,'create'])->name('create');
        Route::post('/', [CompteController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CompteController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CompteController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [CompteController::class, 'show'])->name('show');
        Route::delete('/{id}', [CompteController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('roles')->name('roles.')->group(function(){
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class,'create'])->name('create');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::put('/{id}', [RoleController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [RoleController::class, 'show'])->name('show');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('permissions')->name('permissions.')->group(function(){
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::get('/create', [PermissionController::class,'create'])->name('create');
        Route::post('/', [PermissionController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [PermissionController::class, 'show'])->name('show');
        Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('entites')->name('entites.')->group(function(){
        Route::get('/', [EntiteController::class, 'index'])->name('index');
        Route::get('/create', [EntiteController::class,'create'])->name('create');
        Route::post('/', [EntiteController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [EntiteController::class, 'edit'])->name('edit');
        Route::put('/{id}', [EntiteController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [EntiteController::class, 'show'])->name('show');
        Route::delete('/{id}', [EntiteController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('contrats')->name('contrats.')->group(function(){
        Route::get('/', [ContratController::class, 'index'])->name('index');
        Route::get('/create', [ContratController::class,'create'])->name('create');
        Route::post('/', [ContratController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ContratController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ContratController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [ContratController::class, 'show'])->name('show');
        Route::delete('/{id}', [ContratController::class, 'destroy'])->name('destroy');
        //Route::get('/get-charges', [ContratController::class, 'getCharges'])->name('charges');
    });

    Route::prefix('fournisseurs')->name('fournisseurs.')->group(function(){
        Route::get('/', [FournisseurController::class, 'index'])->name('index');
        Route::get('/create', [FournisseurController::class,'create'])->name('create');
        Route::post('/', [FournisseurController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [FournisseurController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FournisseurController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [FournisseurController::class, 'show'])->name('show');
        Route::delete('/{id}', [FournisseurController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('demandes')->name('demandes.')->group(function(){
        Route::get('/', [DemandeController::class, 'index'])->name('index');
        Route::get('/create', [DemandeController::class,'create'])->name('create');
        Route::post('/', [DemandeController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DemandeController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DemandeController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [DemandeController::class, 'show'])->name('show');
        Route::delete('/{id}', [DemandeController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('articles')->name('articles.')->group(function(){
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('/create', [ArticleController::class,'create'])->name('create');
        Route::post('/', [ArticleController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ArticleController::class, 'update'])->name('update');
        Route::get('/{id}/afficher', [ArticleController::class, 'show'])->name('show');
        Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('destroy');
    });


});
