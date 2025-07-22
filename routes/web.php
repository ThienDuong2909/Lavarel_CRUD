<?php

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

use Illuminate\Support\Facades\File;

// Route::get('/', function () {
//     return File::get(public_path('index.html'));
// });


// Route::resource('/posts', PostController::class);
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::resource('posts', PostController::class);

