<?php

use App\Http\Middleware\HelloMiddleware;

// get…httpのgetメソッド
// '/'…アクセスした場所（ドキュメントルート）（トップページ）
Route::get('/', function () {
    // view(テンプレートファイルを呼び出す)
    // 'welcom'…呼び出すファイルの名前
    return view('welcome');
});



Route::get('hello', 'HelloController@index')
    ->middleware(HelloMiddleware::class);


Route::post('hello', 'HelloController@post');

Route::get('hello/add','HelloController@add');
Route::post('hello/add','HelloController@create');

Route::get('hello/edit','HelloController@edit');
Route::post('hello/edit','HelloController@updata');

Route::get('hello/show', 'HelloController@show');

Route::get('person', 'PersonController@index');

Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');

Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

Route::get('board', 'BoardController@index');

Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest','RestappController');