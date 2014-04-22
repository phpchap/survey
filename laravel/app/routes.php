<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::bind('GroupRepository', 'EloquentGroupRepository');
App::bind('ProductRepository', 'EloquentProductRepository');
App::bind('ReportRepository', 'EloquentReportRepository');

// home page
Route::any('/', 'HomeController@home');

// show products
Route::any('/products', 'HomeController@showProducts');

// show questions
Route::any('/survey', 'HomeController@survey');

// thanks
Route::any('/thanks', 'HomeController@thanks');

// exportAnswers
Route::any('/exportAnswers', 'HomeController@exportAnswers');

// productAnswers
Route::any('/productAnswers', 'HomeController@productAnswers');

// about us
Route::any('/about-us', 'HomeController@aboutUs');
