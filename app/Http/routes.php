<?php

Route::get('/', 'IndexController@index');
Route::get('recode', 'IndexController@recode');
Route::get('test',function(){
 dd(session(['already'=>null]));
	//dd(session('already'));
});
Route::get('getaward/{name}','IndexController@getAward');
Route::get('setaward/{name}','IndexController@setAward');
Route::get('getcount/{name}','IndexController@getCount');