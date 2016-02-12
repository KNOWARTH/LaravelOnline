<?php



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
	

	// User Side Routes
	Route::get('/', 'HomeController@index');
	Route::get('exam','user\ExamController@exam');
	Route::get('editprofile','user\ProfileController@editprofile_user');
	Route::post('updateUserProfile','user\ProfileController@updateprofile');
	Route::get('viewresult','user\ResultController@viewresult');

	Route::get('admin','HomeController@admin');


	// Admin Side Routes
	Route::group(['namespace' => 'admin'], function(){
	// DashboardRoutes
	Route::get('admin','HomeController@index');
	Route::get('home', 'HomeController@index');
	// Manage Exams Routes
	Route::get('manageexam','ExamController@index');
	Route::get('createexam','ExamController@create');
	Route::post('saveExam','ExamController@store');
	Route::get('editExam/{id}','ExamController@edit');
	Route::post('updateExam','ExamController@update');
	Route::post('search', 'ExamController@search');
	// Manage Profile Routes
	Route::get('createadmin','ProfileController@index');
	Route::get('editprofile','ProfileController@edit');
	Route::post('registeradmin','ProfileController@store');
	Route::post('updateprofile','ProfileController@update');
	// Manage Questions Routes
	Route::get('manageQuestions/{id}','QuestionController@index');
	Route::get('add_question_exam/{id}','QuestionController@create');
	Route::post('search', 'QuestionController@search');
	Route::post('addquestion','QuestionController@store');
	Route::post('updateQuestion','QuestionController@update');
	Route::get('editQuestion/{id}','QuestionController@edit');
	Route::get('deleteQuestion/{id}','QuestionController@destroy');

	});



	Route::get('{id}/startexam','user\ExamController@selectexam');
	Route::post('/saveanswer','user\ExamController@saveanswer');
	Route::any('/showresult','user\ExamController@showresult');

});
