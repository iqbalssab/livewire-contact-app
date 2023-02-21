<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', function (){
    return view('pages.home' ,[
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/about', function (){
    return view('pages.about' ,[
        'title' => 'About us',
        'active' => 'about'
    ]);
});

Route::resource('/contacts', ContactController::class);
