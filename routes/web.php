<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExplorarController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/tweets', [TweetController::class, 'index'])->name('home');
Route::delete('/tweets/{tweet:id}/delete', [TweetController::class, 'destroy'])->middleware('auth')->name('deleteTweet');

Route::get('/perfil/{user:name}', [PerfilController::class, 'show'])->name('perfil');
Route::patch('/perfil/{user:name}', [PerfilController::class, 'update'])->middleware('can:edit,user');


Route::get('/perfil/{user:name}/edit', [PerfilController::class, 'edit'])->middleware('can:edit,user')->name('edit');

Route::delete('/perfil/{user:name}/delete', [PerfilController::class, 'destroy'])->name('delete');

Route::post('/perfil/{user:name}/follow', [FollowsController::class, 'store'])->name('follow');

Route::get('/explorar', [ExplorarController::class, 'index'])->middleware('auth')->name('explorar');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');


Route::resource('tweets', TweetController::class)->middleware('auth');

require __DIR__.'/auth.php';
