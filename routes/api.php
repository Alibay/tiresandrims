<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/brands/{brandId}/models', '\App\Modules\Car\Http\Controllers\ModelController@apiFindModels')->name('api-brand-models');
Route::get('/models/{modelId}/generations', '\App\Modules\Car\Http\Controllers\GenerationController@apiFindGenerations')->name('api-model-generations');
Route::get('/generations/{generationId}/modifications', '\App\Modules\Car\Http\Controllers\ModificationController@apiFindModifications')->name('api-generation-modifications');
Route::get('/modifications/{modificationId}/equipments', '\App\Modules\Car\Http\Controllers\EquipmentController@apiFindEquipments')->name('api-modification-equipments');

Route::get('/detail-models', '\App\Modules\Car\Http\Controllers\DetailModelController@apiFindByDetailIds')->name('api-detail-models');