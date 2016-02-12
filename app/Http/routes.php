<?php


// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['middleware' => 'web'], function () {

    Route::auth();
    // Authentication routes...
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	// Registration routes...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');
	Route::controllers([
		'auth' => 'Auth\AuthController',
	   'password' => 'Auth\PasswordController',
	]);

	// Starting Route of Admin and User Start
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/admin', 'HomeController@admin');
	// Starting Route of Admin and User End

	// User Side Routes
	Route::get('exam','user\ExamController@exam');
	Route::get('editprofile','user\ProfileController@editprofile_user');
	Route::post('updateUserProfile','user\ProfileController@updateprofile');
	Route::get('viewresult','user\ResultController@viewresult');

	// Admin SIde Routes
	Route::get('manageexam','admin\ExamController@manageexam');
	Route::get('createexam','admin\ExamController@create');
	Route::post('saveCreateExam','admin\ExamController@store');
	Route::post('updateExamStatus','admin\ExamController@updateStatus');
	// Route::get('editprofile','admin\ProfileController@editprofile_admin');
	Route::get('createquestion','admin\QuestionController@create');
	Route::get('add_question_exam/{id}','admin\QuestionController@createQuestion');
	Route::post('addquestion','admin\QuestionController@store');
	Route::get('createadmin','admin\ProfileController@create');
	Route::post('registeradmin','admin\ProfileController@store');


	Route::get('{id}/startexam','user\ExamController@selectexam');
	Route::post('/saveanswer','user\ExamController@saveanswer');
	Route::any('/showresult','user\ExamController@showresult');

});
