<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\LinkController;

// Route::get('/', function () {
//   $visited = DB::select('select * from places where visited = ?', [1]);
//   $togo = DB::select('select * from places where visited = ?', [0]);

//   return view('travel_list', ['visited' => $visited, 'togo' => $togo]);
// });
// Route::get('index', 'NewController@index');
// Route::get('index/{id}', 'NewController@show');
// Route::get('wow', 'CollectionController@index');
Route::get('/', 'LinkController@index');;
Route::post('store-form', 'LinkController@store');
Route::post('search-song', 'LinkController@searchSong');
Route::post('search-artist', 'LinkController@searchArtist');
Route::get('delete-song', 'LinkController@destroy');
Route::patch('edit-song', 'LinkController@update');
Route::get('hello', function () {
  return view('hello');
});