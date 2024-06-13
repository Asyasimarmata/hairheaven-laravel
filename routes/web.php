<?php

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
Route::group(['middleware' => ['guest']], function () {
    Route::get("/", "PageController@login")->name('login');
    Route::post("/login", "AuthController@ceklogin");
});

Route::group(['middleware' => ['auth']], function () {

Route::get("/logout", "AuthController@ceklogout");
Route::get("/user", "PageController@edituser");
Route::post("/updateuser", "PageController@updateuser");
Route::get("/home", "PageController@home");
Route::get("/produk", "PageController@produk");
Route::get("/produk/form-add", "PageController@addproduk");
Route::post("/save", "PageController@saveproduk");
Route::get("/form-edit/{id}", "PageController@editproduk");
Route::put("/update/{id}", "PageController@updateproduk");
Route::get("/delete/{id}", "PageController@deleteproduk");
Route::get("/about", "PageController@about");
Route::get("/faq", "PageController@faq");
});

Route::get('/test-connection', function () {
    $produk = Produk::all();
    return $produk;
});



