<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PostSugestController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', function () {
    return view('admin',[
        "title"=>'Admin']);
});

// return view('login/signin');
Route::get('/', function () {
    return view('welcome',[
        "title"=>'dashbroad']);
});

Route::get('/notepad', function () {
    return view('dashbroad.notepad',[
        "title"=>'notepad'
    ]);
});
Route::get('/setting', function () {
    return view('dashbroad.setting',[
        "title"=>'setting'
    ]);
});

//fb login
Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback')->name('user');
});
//end fb login

// login
Route::get('/register', [loginController::class, 'register'])->name('register');
Route::post('/register', [loginController::class, 'registerpost'])->name('register');
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'loginpost'])->name('login');
Route::post ('/logout', [loginController::class, 'logout'])->name('logout');
// end logout

//sugest
Route::post ('/postSugest', [PostSugestController::class, 'sugestpost'])->name('PostSugest');
//end sugest

//kegiatan
Route::post ('/post', [KegiatanController::class, 'store']);
Route::get('/dashbroad',[KegiatanController::class,'index']);
Route::get('/isitugas', [KegiatanController::class,'tampilisi']);
//end kegiatan

//harian
Route::get('/harian', [TugasController::class,'index']);
Route::get('/harian-lanjut',[TugasController::class,'indexlanjut']);
// end harian

// Route::get('/dashbroad',[loginController::class,'index']);
