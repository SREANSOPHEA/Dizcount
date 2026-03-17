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


Route::get("/admin/login",[adminController::class,"login"])->name('login');
Route::post("/admin/login-submit",[adminController::class,"loginSubmit"])->name('loginSubmit');

Route::middleware(['auth:api'])->group(function(){
// Route::middleware(['auth:api'])->group(function(){
    // Admin
    Route::get("/admin",[adminController::class,"dashboard"])->name('dashboard');
    Route::get("/admin/signout",[adminController::class,"logout"])->name('logout');
    Route::get("/admin/viewAdmin",[adminController::class,"viewAdmin"]);

    Route::middleware(['role:superAdmin'])->group(function(){
        Route::get("/admin/addAdmin",[adminController::class,"addAdmin"]);
        Route::post("/admin/addAdmin-submit",[adminController::class,"addAdminSubmit"]);
        Route::post("/admin/deleteAdmin",[adminController::class,"deleteAdmin"]);
        Route::post("/admin/editAdmin-submit/{id}",[adminController::class,"editAdminSubmit"]);
        Route::get("/admin/editAdmin/{id}",[adminController::class,"editAdmin"]);
    });


    Route::get("/admin/viewPost",[postController::class,"viewPost"]);
    Route::get("/admin/view/PercentageDiscount/{id}",[postController::class,'viewPercentageDiscount']);
    Route::get("/admin/view/FreeItemDiscount/{id}",[postController::class,'viewFreeDiscount']);
    Route::get("/admin/upload/Post",[postController::class,"uploadPost"]);
    Route::post("/admin/upload/discountPercentage",[postController::class,"uploadPostDiscount"]);
    Route::post("/admin/upload/discountfree",[postController::class,"uploadPostFree"]);
    Route::get("/admin/Edit/discountPost/{id}",[postController::class,"editDiscountPost"]);
    Route::post("/admin/edit/discountPost/percentage/{id}",[postController::class,"editDiscountPercentagePost"]);
    Route::post("/admin/edit/discountPost/free/{id}",[postController::class,"editDiscountFreePost"]);

    Route::get("/admin/viewShop",[shopController::class,"viewShop"]);
    Route::get("/admin/viewShop/{id}",[shopController::class,"viewShopDetail"]);
    Route::get("/admin/addShop",[shopController::class,"addShop"]);
    Route::post("/admin/addShop-submit",[shopController::class,"addShopSubmit"]);
    Route::get("/admin/editShop/{id}",[shopController::class,"editShop"]);
    Route::post("/admin/editShop-submit/{id}",[shopController::class,"editShopSubmit"]);
    Route::post("/admin/deleteShop",[shopController::class,"deleteShop"]);
    Route::post("/admin/addShopSocial",[shopController::class,"addShopSocial"]);
});
