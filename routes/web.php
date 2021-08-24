<?php

use App\Experience;
use App\Project;
use App\Skill;
use App\Social;
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
	$socials = Social::whereNull('project_id')->get();
	$skills = Skill::orderBy('name')->get();

	return view('welcome')->with([
		'skills' => $skills,
		'socials' => $socials,
	]);
});

Route::get('/cv', function () {
	$socials = Social::whereNull('project_id')->get();
	$skills = Skill::orderBy('name')->get();
	$projects = Project::orderBy("rank")->get()->take(4)->chunk(2);
	$experience = Experience::get();

	return view('cv')->with([
		'skills' => $skills,
		'socials' => $socials,
		'projects' => $projects,
		'experience' => $experience,
	]);
});

//Login Routes...
Auth::routes(['register' => FALSE, 'reset' => FALSE]);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/dash', 'HomeController@index')->name('dashboard');

	Route::resource('socials', 'SocialController')->only([ 'store', 'update', 'destroy' ]);
	Route::resource('projects', 'ProjectController')->only([ 'store', 'update', 'destroy' ]);
	Route::resource('experiences', 'ExperienceController')->only([ 'store', 'update', 'destroy' ]);
	Route::resource('skills', 'SkillController')->only([ 'store', 'update', 'destroy' ]);
});

Route::get('/socials', 'SocialController@index');
Route::get('/projects', 'ProjectController@index');
Route::get('/experiences', 'ExperienceController@index');
Route::get('/imageables', 'ImageController@index');
Route::get('/skills', 'SkillController@index');
