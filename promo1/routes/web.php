<?php

use App\Address;
use App\Module;
use App\Promo;
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

Route::get('/', "PromoController@index");
Route::resources([
    "promo" => "PromoController",
    "student" => "StudentController",
    "module" => "ModuleController"
    ]);

Route::post("promo/storemodules", "PromoController@storeModules")
->name("promo.store_modules");

Route::get("test", function () {
    $address = Address::find(2);

    return $address->promo;

});
