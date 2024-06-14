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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['guest']], function() {
    Route::get("/" , "PageController@login")->name('login');
    Route::post("/login", "AuthController@cekLogin");
});


Route::group(['middleware' => ['auth']], function() {
    Route::get("/user", "PageController@formedituser");
    Route::post("/updateuser", "PageController@updateuser");
    Route::get("/logout", "AuthController@cekLogout");
    Route::get("/home", "PageController@home");
    Route::get("/barang", "PageController@barang");
    Route::get("/barang/add-form" , "PageController@formaddbarang")->middleware('auth');
    Route::post("/save" , "PageController@savebarang");
    Route::post("/edit","PageController@savebarang");
    Route::get("/barang/edit-form/{id}", "PageController@formeditbarang");
    Route::put("/update/{id}", "PageController@updatebarang");
    Route::get("/delete/{id}", "PageController@deletebarang");
});