<?php

use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\CategoryController;


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

Auth::routes();

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//landing
Route::get('/', [LandingController::class, 'index'])->name('landing');

//contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact_index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact_store');
Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact_show');
Route::get('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact_destroy');

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category_index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category_create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category_store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit');
Route::post('/category/update', [CategoryController::class, 'update'])->name('category_update');
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');

//webinar
Route::get('/webinar', [WebinarController::class, 'index'])->name('webinar_index');
Route::get('/webinar/create', [WebinarController::class, 'create'])->name('webinar_create');
Route::post('/webinar/store', [WebinarController::class, 'store'])->name('webinar_store');
Route::post('/webinar/show/{id}', [WebinarController::class, 'show'])->name('webinar_show');
Route::get('/webinar/edit/{id}', [WebinarController::class, 'edit'])->name('webinar_edit');
Route::post('/webinar/update', [WebinarController::class, 'update'])->name('webinar_update');
Route::get('/webinar/status/{id}', [WebinarController::class, 'status'])->name('webinar_status');
Route::get('/webinar/destroy/{id}', [WebinarController::class, 'destroy'])->name('webinar_destroy');
