<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'App\Http\Controllers\Api\V1\AuthController@login');


Route::group([
    'middleware' => 'auth',
    'prefix' => 'v1'

], function ($router) {

    Route::group(['prefix' => 'auth'], function() {
        Route::post('logout', 'App\Http\Controllers\Api\V1\AuthController@logout');
    });

    Route::group(['prefix' => 'invoice'], function() {
        Route::post('invoice', 'App\Http\Controllers\Api\V1\ItemsController@createItem');
        Route::get('invoices', 'App\Http\Controllers\Api\V1\InvoiceController@getInvoices');
        Route::get('invoices/{id}', 'App\Http\Controllers\Api\V1\InvoiceController@getInvoicesId');
        Route::put('updateinvoice/{id}', 'App\Http\Controllers\Api\V1\ItemsController@updateItem');
    });

    Route::group(['prefix' => 'vatvalue'], function() {
        Route::get('vatvalue', 'App\Http\Controllers\Api\V1\VatValueController@getVatValue');
    });

});


