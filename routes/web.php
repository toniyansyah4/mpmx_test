<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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
    return view('welcome');
});

Auth::routes([
    'register' => false,
]);

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [App\Http\Controllers\NewsController::class, 'index'])->name('admin');
    // Category
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/add-category', [App\Http\Controllers\CategoryController::class, 'add'])->name('add-category');
    Route::post('post-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('post-category');
    Route::get('/edit-category/{slug}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category');
    Route::put('/put-category/{slug}', [App\Http\Controllers\CategoryController::class, 'update'])->name('put-category');
    Route::get('/destroy-category/{slug}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroy-category');
    Route::get('/read-category/{slug}', [App\Http\Controllers\CategoryController::class, 'read'])->name('read-category');

    // News
    Route::get('/add-news', [App\Http\Controllers\NewsController::class, 'add'])->name('add-news');
    Route::post('post-news', [App\Http\Controllers\NewsController::class, 'create'])->name('post-news');
    Route::get('/edit-news/{slug}', [App\Http\Controllers\NewsController::class, 'edit'])->name('edit-news');
    Route::put('/put-news/{slug}', [App\Http\Controllers\NewsController::class, 'update'])->name('put-news');
    Route::get('/delete-news/{slug}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('destroy-news');
    Route::get('/read-news/{slug}', [App\Http\Controllers\NewsController::class, 'read'])->name('read-news');

    // Departement
    Route::get('/departement', [App\Http\Controllers\DepartementController::class, 'index'])->name('departement');
    Route::get('/add-departement', [App\Http\Controllers\DepartementController::class, 'add'])->name('add-departement');
    Route::post('post-departement', [App\Http\Controllers\DepartementController::class, 'create'])->name('post-departement');
    Route::get('/edit-departement/{id}', [App\Http\Controllers\DepartementController::class, 'edit'])->name('edit-departement');
    Route::put('/put-departement/{id}', [App\Http\Controllers\DepartementController::class, 'update'])->name('put-departement');
    Route::get('/destroy-departement/{id}', [App\Http\Controllers\DepartementController::class, 'destroy'])->name('destroy-departement');
    Route::get('/read-departement/{id}', [App\Http\Controllers\DepartementController::class, 'read'])->name('read-departement');

    // Direktur
    Route::get('/direktur', [App\Http\Controllers\DirekturController::class, 'index'])->name('direktur');
    Route::get('/add-direktur', [App\Http\Controllers\DirekturController::class, 'add'])->name('add-direktur');
    Route::post('post-direktur', [App\Http\Controllers\DirekturController::class, 'create'])->name('post-direktur');
    Route::get('/edit-direktur/{id}', [App\Http\Controllers\DirekturController::class, 'edit'])->name('edit-direktur');
    Route::put('/put-direktur/{id}', [App\Http\Controllers\DirekturController::class, 'update'])->name('put-direktur');
    Route::get('/destroy-direktur/{id}', [App\Http\Controllers\DirekturController::class, 'destroy'])->name('destroy-direktur');
    Route::get('/read-direktur/{id}', [App\Http\Controllers\DirekturController::class, 'read'])->name('read-direktur');

    // Divisi
    Route::get('/divisi', [App\Http\Controllers\DivisiController::class, 'index'])->name('divisi');
    Route::get('/add-divisi', [App\Http\Controllers\DivisiController::class, 'add'])->name('add-divisi');
    Route::post('post-divisi', [App\Http\Controllers\DivisiController::class, 'create'])->name('post-divisi');
    Route::get('/edit-divisi/{id}', [App\Http\Controllers\DivisiController::class, 'edit'])->name('edit-divisi');
    Route::put('/put-divisi/{id}', [App\Http\Controllers\DivisiController::class, 'update'])->name('put-divisi');
    Route::get('/destroy-divisi/{id}', [App\Http\Controllers\DivisiController::class, 'destroy'])->name('destroy-divisi');
    Route::get('/read-divisi/{id}', [App\Http\Controllers\DivisiController::class, 'read'])->name('read-divisi');

    // Managements
    Route::get('/management', [App\Http\Controllers\ManagementsController::class, 'index'])->name('management');
    Route::get('/add-management', [App\Http\Controllers\ManagementsController::class, 'add'])->name('add-management');
    Route::post('post-management', [App\Http\Controllers\ManagementsController::class, 'create'])->name('post-management');
    Route::get('/edit-management/{id}', [App\Http\Controllers\ManagementsController::class, 'edit'])->name('edit-management');
    Route::put('/put-management/{id}', [App\Http\Controllers\ManagementsController::class, 'update'])->name('put-management');
    Route::get('/destroy-management/{id}', [App\Http\Controllers\ManagementsController::class, 'destroy'])->name('destroy-management');
    Route::get('/read-management/{id}', [App\Http\Controllers\ManagementsController::class, 'read'])->name('read-management');

    //User
    Route::get('/user', [App\Http\Controllers\UsersController::class, 'index'])->name('user');
    Route::get('/add-user', [App\Http\Controllers\UsersController::class, 'add'])->name('add-user');
    Route::post('post-user', [App\Http\Controllers\UsersController::class, 'create'])->name('post-user');
    Route::get('/edit-user/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('edit-user');
    Route::put('/put-user/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('put-user');
    Route::get('/destroy-user/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('destroy-user');
    Route::get('/read-user/{id}', [App\Http\Controllers\UsersController::class, 'read'])->name('read-user');
});

Route::group(['middleware' => 'employee'], function () {
    Route::get('/employee', [App\Http\Controllers\NewsController::class, 'index'])->name('employee');
    // News
    Route::get('/read-news/{slug}', [App\Http\Controllers\NewsController::class, 'read'])->name('read-news');

    // Departement
    Route::get('/departement', [App\Http\Controllers\DepartementController::class, 'index'])->name('departement');
    Route::get('/read-departement/{id}', [App\Http\Controllers\DepartementController::class, 'read'])->name('read-departement');

    // Direktur
    Route::get('/direktur', [App\Http\Controllers\DirekturController::class, 'index'])->name('direktur');
    Route::get('/read-direktur/{id}', [App\Http\Controllers\DirekturController::class, 'read'])->name('read-direktur');

    // Divisi
    Route::get('/divisi', [App\Http\Controllers\DivisiController::class, 'index'])->name('divisi');
    Route::get('/read-divisi/{id}', [App\Http\Controllers\DivisiController::class, 'read'])->name('read-divisi');

    // Managements
    Route::get('/management', [App\Http\Controllers\ManagementsController::class, 'index'])->name('management');
    Route::get('/read-management/{id}', [App\Http\Controllers\ManagementsController::class, 'read'])->name('read-management');
});