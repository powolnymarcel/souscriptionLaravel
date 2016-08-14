<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//$http = new \Braintree\Http(\Braintree\Configuration::$global);
//$path = \Braintree\Configuration::$global->merchantPath() . '/transactions/522jqk56/settle';
//$http->put($path);
//
//die();






Route::get('/', function () {
    return view('welcome');
});

Route::auth();



Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/plan/{plan}', 'PlanController@montrerPlan')->name('plans.montrerPlan');
    Route::get('/braintree/token', 'BraintreeTokenController@token')->name('braintree.token');

    Route::post('/souscription','SouscriptionController@creation')->name('souscription.creation');




    Route::group(['middleware' => 'aSouscris'], function () {
        Route::get('/lessons','CoursController@index')->name('cours.index');
        Route::get('/souscription', 'SouscriptionController@index')->name('souscription.index');
        Route::post('/souscription/annuler', 'SouscriptionController@annuler')->name('souscription.annuler');
        Route::post('/souscription/reprendre', 'SouscriptionController@reprendre')->name('souscription.reprendre');
    });

    Route::group(['middleware' => 'aSouscris.pro'], function () {
        Route::get('/lessons/pro', 'CoursController@pro')->name('lessons.pro');
    });

    Route::get('/factures', 'FactureController@index')->name('factures.index');


    Route::group(['middleware' => 'client'], function () {
        Route::get('/factures', 'FactureController@index')->name('factures.index');
        Route::get('/factures/{factureId}', 'FactureController@show')->name('factures.show');
    });

});

Route::post('/webhook/braintree', 'BraintreeWebhookController@handleWebhook');
