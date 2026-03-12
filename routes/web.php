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
Route::get("/admin",[adminController::class,"dashboard"])->name('dashboard');
Route::get("/admin/login",[adminController::class,"login"])->name('login');
Route::get("/admin/signout",[adminController::class,"logout"])->name('logout');
Route::post("/admin/login-submit",[adminController::class,"loginSubmit"])->name('loginSubmit');
Route::get("/admin/viewAdmin",[adminController::class,"viewAdmin"]);

// Create new Admin
Route::get("/admin/addAdmin",[adminController::class,"addAdmin"]);
Route::post("/admin/addAdmin-submit",[adminController::class,"addAdminSubmit"]);

// Delete Admin
Route::post("/admin/deleteAdmin",[adminController::class,"deleteAdmin"]);

// Update Admin
Route::post("/admin/editAdmin-submit/{id}",[adminController::class,"editAdminSubmit"]);
Route::get("/admin/editAdmin/{id}",[adminController::class,"editAdmin"]);

// Post Discount
Route::get("/admin/viewPost",[postController::class,"viewPost"]);
Route::get("/admin/uploadPost",[postController::class,"uploadPost"]);

// Shop Controller
Route::get("/admin/viewShop",[shopController::class,"viewShop"]);
Route::get("/admin/viewShop/{id}",[shopController::class,"viewShopDetail"]);

// Create new Shop
Route::get("/admin/addShop",[shopController::class,"addShop"]);
Route::post("/admin/addShop-submit",[shopController::class,"addShopSubmit"]);
Route::get("/admin/editShop/{id}",[shopController::class,"editShop"]);
Route::post("/admin/editShop-submit/{id}",[shopController::class,"editShopSubmit"]);


// Category
Route::get("/admin/category",[categoryController::class,"category"]);
