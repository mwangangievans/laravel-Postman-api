<?php

use App\Article;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List the articles
Route::get('articles','ArticleController@index');

//list single article
Route::get('article/{id}','ArticleController@show');

//Create new article

Route::post('article','ArticleController@show');

//update article

Route::put('article','ArticleController@store');

//delete article

Route::delete('article/{id}','ArticleController@destroy');
