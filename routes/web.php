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

Route::get('/dash', 'HomeController@index')->name('dashboard');

//Socials
Route::get('/socials', 'SocialController@index');

//Projects
Route::get('/projects', 'ProjectController@index');

//Experience
Route::get('/experiences', 'ExperienceController@index');
