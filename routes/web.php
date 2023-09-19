<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/blog', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/createBlog', function () {
        return view('blogCreate');
    })->name('createBlog');
    Route::get('/blog/{blogId}', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/delete/{blogId}', [BlogController::class, 'delete'])->name('blog.delete');
    Route::post('/comment', [CommentController::class, 'create'])->name('comment.create');
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment/delete/{commentId}', [CommentController::class, 'delete'])->name('comment.delete');


});

require __DIR__ . '/auth.php';
