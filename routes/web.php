<?php

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

Route::get('/', function () {
    $socials = App\Social::all()->whereNull('project_id');
    return view('welcome')->with([
        'socials' => $socials,
    ]);
});

//Login Routes...
Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dash', 'HomeController@index')->name('dashboard');
});

//Socials
Route::get('/socials', 'SocialController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/socials', 'SocialController@store');
    Route::patch('/socials/{social}', 'SocialController@update');
    Route::delete('/socials/{social}', 'SocialController@delete');
});

//Projects
Route::get('/projects', 'ProjectController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/projects', 'ProjectController@store');
    Route::patch('/projects/{project}', 'ProjectController@update');
    Route::delete('/projects/{project}', 'ProjectController@delete');
});

//Experience
Route::get('/experiences', 'ExperienceController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/experiences', 'ExperienceController@store');
    Route::patch('/experiences/{experience}', 'ExperienceController@update');
    Route::delete('/experiences/{experience}', 'ExperienceController@delete');
});

//Images
Route::get('/imageables', 'ImageController@index');

//Skills
Route::get('/skills', 'SkillController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/skills', 'SkillController@store');
    Route::patch('/skills/{skill}', 'SkillController@update');
    Route::delete('/skills/{skill}', 'SkillController@delete');
});
