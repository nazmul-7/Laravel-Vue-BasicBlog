<?php



Route::get('/test', function () {
    return view('seopage');
});
Route::get('app/get/some-data-from-laravel', [
    'uses' => 'HomeController@data',
]);
Route::post('/userAuthenticate', [
    'uses' => 'HomeController@userAuthenticate',
]);
Route::post('/getPosts', [
    'uses' => 'PostController@getPosts',
]);
Route::post('/getPost', [
    'uses' => 'PostController@getPost',
]);
Route::post('create', [
    'uses' => 'PostController@postAdminCreate',
    'as' => 'admin.create'
]);
Route::post('getLikePost', [
    'uses' => 'PostController@getLikePost',
    
]);
Route::post('getAdminDelete', [
    'uses' => 'PostController@getAdminDelete',
    
]);

Route::get('{slug}', function () {
    return view('index');
})->where('slug', '([A-z\d-\/_.]+)?');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
