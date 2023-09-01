<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ruanganController;
//use App\Http\Controllers\LoginController;
//use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use views\sesi\register;
use App\Http\Controllers\pendataanController;
//use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\Cetak1Controller;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ggController;






//use App\Http\Controllers\HomeController;







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
    return view('/welcome/welcome');
});


//Route::resource('ruangan', ruanganController::class)->Middleware('isLogin');
Route::resource('ruangan', ruanganController::class);
Route::get('/pendataan', [pendataanController::class, 'iindex']);

Route::get('/sesi',[SessionController::class, 'index']);
Route::post('/sesi/login',[SessionController::class, 'login']);
Route::get('/sesi/logout',[SessionController::class, 'logout']);
Route::get('/sesi/registrasi',[SessionController::class, 'register']);
Route::post('/sesi/create',[SessionController::class, 'create']);
Route::resource('pendataan',pendataanController::class);
//Create
//Route::resource('pendataan', pendataanController::class)->Middleware('isLogin');
Route::resource('cetak', CetakController::class);
Route::resource('cetak5', Cetak1Controller::class);
Route::resource('create', CreateController::class);
Route::resource('chart', ChartController::class);
Route::resource('navbar', CetakController::class);

    





//Route::get('pendataan', [pendataanController::class, 'iindex'])->name('pendataan');
//Route::get('pendataan/record', [pendataanController::class, 'record'])->name('pendataan/record');
//Route::get('/pendataan/cetak',[LaporanController::class, 'cetak']);
//Route::get('/select', [pendataanController::class, 'getDate']);
//Route::get('/', [PostController::class, 'pendataan.cetak']);
//Route::post('/select', [pendataanController::class, 'getDate']);
//Route::get('/pendataan', 'pendataanController@cetak');



//Cetak Data
//Route::resource('Cetak',CetakController::class);

// Route::post('/sesi1/login',[SessionController::class, 'login']);
// Route::get('/sesi1/logout',[SessionController::class, 'logout']);
// Route::get('/sesi1/registrasi',[SessionController::class, 'register']);
// Route::post('/sesi1/create',[SessionController::class, 'create']);s
//Route::get('pendataan/cetak', [pendataanController::class, 'cetak'])->name('cetak')->middleware('auth');

//Route::get('/cetak','pendataanController@cetakpendataan')->name('cetak');
//Route::get('/cetak','pendataanController@cetakForm')->name('cetak');
/*Route::group(['prefix' => 'reports'], function() {
    Route::get('/order', 'HomeController@orderReport')->name('report.order');
    Route::get('/order/pdf/{daterange}', 'HomeController@orderReportPdf')->name('report.order_pdf');
    Route::resource('Home',HomeController::class);
    Route::get('/return', 'HomeController@returnReport')->name('report.return');
    Route::get('/return/pdf/{daterange}', 'HomeController@returnReportPdf')->name('report.return_pdf');
    */

    // [.. ROUTING LAINNYA ..]

//Route::get('/pendataan', 'pendataanController@index');
//Route::get('/pendataan/cetak_pdf', 'pendataanController@cetak_pdf');

//Route::resource('login', LoginController::class);







 Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');