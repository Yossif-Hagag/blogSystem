<?php

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

Route::get('/', function () {return view('welcome');});

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('adminAuth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin')->middleware('userAuth');
Route::get('/addArticle', [App\Http\Controllers\AdminController::class, 'addArticle'])->name('addArticle')->middleware('userAuth');
Route::post('/storeArticle', [App\Http\Controllers\AdminController::class, 'storeArticle'])->name('storeArticle')->middleware('userAuth');
Route::get('/viewArticles', [App\Http\Controllers\AdminController::class, 'viewArticles'])->name('viewArticles')->middleware('userAuth');
Route::post('/publishArticle/{id}', [App\Http\Controllers\AdminController::class, 'publishArticle'])->name('publishArticle')->middleware('userAuth');
Route::post('/unPublishArticle/{id}', [App\Http\Controllers\AdminController::class, 'unPublishArticle'])->name('unPublishArticle')->middleware('userAuth');
Route::post('/deleteArticle/{id}', [App\Http\Controllers\AdminController::class, 'deleteArticle'])->name('deleteArticle')->middleware('userAuth');
Route::get('/updateArticle/{id}', [App\Http\Controllers\AdminController::class, 'updateArticle'])->name('updateArticle')->middleware('userAuth');
Route::post('/saveArticle/{id}', [App\Http\Controllers\AdminController::class, 'saveArticle'])->name('saveArticle')->middleware('userAuth');
Route::get('/filterArticle', [App\Http\Controllers\HomeController::class, 'filterArticle'])->name('filterArticle')->middleware('homeAuth');
Route::get('/commentsForPost/{id}', [App\Http\Controllers\HomeController::class, 'commentsForPost'])->name('commentsForPost')->middleware('adminAuth');
Route::post('/storeComment/{article_id}', [App\Http\Controllers\CommentController::class, 'storeComment'])->name('storeComment')->middleware('adminAuth');