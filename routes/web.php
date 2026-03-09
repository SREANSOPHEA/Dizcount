<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\postController;
use App\Http\Controllers\admin\shopController;
use App\Http\Controllers\user\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'kh'])) {
        abort(400);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('language.switch');

// User
Route::get("/",[userController::class,'home']);
Route::get("/about",[userController::class,'about']);
Route::get("/contact",[userController::class,'contact']);
Route::get("/viewPost/{id}",[userController::class,'viewPost']);




// Admin
Route::get("/admin/login",[adminController::class,"login"])->name('login');
Route::post("/admin/login-submit",[adminController::class,"loginSubmit"])->name('loginSubmit');
Route::get("/admin",[adminController::class,"dashboard"])->name('dashboard');

// Post Discount
Route::get("/admin/viewPost",[postController::class,"viewPost"]);
Route::get("/admin/uploadPost",[postController::class,"uploadPost"]);

// Shop Controller
Route::get("/admin/viewShop",[shopController::class,"viewShop"]);
Route::get("/admin/addShop",[shopController::class,"addShop"]);

// Category
Route::get("/admin/category",[categoryController::class,"category"]);
