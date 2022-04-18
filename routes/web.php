<?php


use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ContactController;

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




Route::get('/', function() {
    return view('index', [
        "title" => "Beranda"
   ]);
});

Route::get('/about', function() {
    return view('about', [
        "title" => "About",
        "nama" => "Diana Ayu Kuatmi",
        "email" => "3103120069@student.smktelkom-pwt.sch.id",
        "gambar" => "dianaaa.jpeg"
    ]);
});

 Route::get('/contact', function() {
    return view('gallery', [
       "title" => "Gallery"
   ]);
 });

// Route::resource('/contacts', ContactController::class);
Route::get('/contacts/create', [ContactHomeController::class, 'create'])->name('contact.create');
Route::post('/contacts/create', [ContactHomeController::class, 'store'])->name('contact.store');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contacts/index', [ContactHomeController::class, 'index'])->name('contact.index');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])-> name('contacts.edit');
    Route::post('/contacts/{id}/update', [ContactController::class, 'edit'])-> name('contacts.destroy');
});