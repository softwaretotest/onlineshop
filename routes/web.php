<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']);

// ---- Catagory ------
route::get('/view_catagory', [AdminController::class, 'view_catagory']);

route::post('/add_catagory', [AdminController::class, 'add_catagory']);

route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);


// ---- Unit ------
route::get('/view_product_unit', [AdminController::class, 'view_product_unit']);

route::post('/add_product_unit', [AdminController::class, 'add_product_unit']);

route::get('/delete_product_unit/{id}', [AdminController::class, 'delete_product_unit']);


// ---- Product ------
route::get('/show_product', [AdminController::class, 'show_product']);

route::get('/view_product', [AdminController::class, 'view_product']);

route::post('/add_product', [AdminController::class, 'add_product']);

route::get('/add_product', function () { // prevent user from manipulate url
    return redirect()->back();
});

route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);

route::post('/update_product/{id}', [AdminController::class, 'update_product']);

route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
