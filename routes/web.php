<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);
//Resource dipake buat semua route CRUD yang diperlukan untuk mengelola sumber daya "students".
//students itu nama database yg mau dikelola
//StudentController akan mengatur semua aksi yang terkait dengan sumber daya "students".
