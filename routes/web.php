<?php
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
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

// Index
Route::get('/', [PostsController::class, 'index']);

//Posts
Route::get('/posts/new', [PostsController::class, 'create']);
Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::post('/posts', [PostsController::class, 'store']);

//Comments
Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);
Route::delete('/comments/{comment}', [CommentsController::class, 'destroy']);
