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

Route::get("/",[
    "as" => "web.index",
    "uses" => "WebController@index"
]);

Route::get("/contacto",[
    "as" => "web.contacto",
    "uses" => "WebController@contacto"
]);

Route::get("/articulos",[
    "as" => "web.articulos",
    "uses" => "WebController@articulos"
]);

Route::get("/sucursales",[
    "as" => "web.sucursales",
    "uses" => "WebController@sucursales"
]);


Route::group(["prefix" => "panel"],function (){

    Route::get("/", [
       "as" => "panel.index",
       "uses" => "PanelController@index"
    ]);


    Route::group(["prefix" => "articulos"],function (){

        Route::get("/",[
            "as" => "articulos.index",
            "uses" => "ArticulosController@index"
        ]);


        Route::get("/create",[
            "as" => "articulos.create",
            "uses" => "ArticulosController@create"
        ]);


        Route::post("/store",[
            "as" => "articulos.store",
            "uses" => "ArticulosController@store"
        ]);


        Route::get("/{id}/edit",[
            "as" => "articulos.edit",
            "uses" => "ArticulosController@edit"
        ]);


        Route::put("/{id}/update",[
            "as" => "articulos.update",
            "uses" => "ArticulosController@update"
        ]);

        Route::delete("/{id}/destroy",[
            "as" => "articulos.destroy",
            "uses" => "ArticulosController@destroy"
        ]);


    });
    
    Route::group(["prefix" => "sucursales"],function (){

        Route::get("/",[
            "as" => "sucursales.index",
            "uses" => "SucursalesController@index"
        ]);


        Route::get("/create",[
            "as" => "sucursales.create",
            "uses" => "SucursalesController@create"
        ]);


        Route::post("/store",[
            "as" => "sucursales.store",
            "uses" => "SucursalesController@store"
        ]);


        Route::get("/{id}/edit",[
            "as" => "sucursales.edit",
            "uses" => "SucursalesController@edit"
        ]);


        Route::put("/{id}/update",[
            "as" => "sucursales.update",
            "uses" => "SucursalesController@update"
        ]);

        Route::delete("/{id}/destroy",[
            "as" => "sucursales.destroy",
            "uses" => "SucursalesController@destroy"
        ]);


    });

});
Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
 
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
 
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
 
// Email Verification Routes...
Route::emailVerification();

Route::get('/home', 'HomeController@index')->name('home');