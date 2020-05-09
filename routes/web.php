<?php

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
// Route::get('/', function () {
//     return view('auth/login');
// });




Route::get('lang/{locale}', 'LocalizationController@lang');
 

Auth::routes();

Route::group(['prefix' => 'tutor' ,'middleware' => 'tutor'], function() {
	Route::get('/dashboard','Tutor\DashboardController@index');
	Route::get('/logout', 'Tutor\DashboardController@logout');
	Route::get('/profile', 'Tutor\TutorController@index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

	Route::get('/add_grade','Admin\GradeController@add_grade');
	Route::post('/submit_grade','Admin\GradeController@submit_grade');
	Route::get('/edit_grade/{id}','Admin\GradeController@edit_grade');
	Route::post('/update_grade','Admin\GradeController@update_grade');
	Route::get('/grade_list','Admin\GradeController@grade_list');
	Route::get('/change_grade_status','Admin\GradeController@change_grade_status');
	Route::post('/delete_grade','Admin\GradeController@delete_grade');

	Route::get('/add_course','Admin\CourseController@add_course');
	Route::post('/submit_course','Admin\CourseController@submit_course');
	Route::get('/edit_course/{id}','Admin\CourseController@edit_course');
	Route::post('/update_course','Admin\CourseController@update_course');
	Route::get('/course_list','Admin\CourseController@course_list');
	Route::get('/change_course_status','Admin\CourseController@change_course_status');
	Route::post('/delete_course','Admin\CourseController@delete_course');

	//Course topic
	Route::get('/add_course_topic','Admin\CourseTopicController@add_course_topic');
	Route::post('/submit_course_topic','Admin\CourseTopicController@submit_course_topic');
	Route::get('/edit_course_topic/{course_topic_id}','Admin\CourseTopicController@edit_course_topic');
	Route::post('/update_course_topic','Admin\CourseTopicController@update_course_topic');
	Route::get('/course_topic_list','Admin\CourseTopicController@course_topic_list');
	Route::get('/change_course_topic_status','Admin\CourseTopicController@change_course_topic_status');
	Route::post('/delete_course_topic','Admin\CourseTopicController@delete_course_topic');

	
	Route::get('/add_student','Admin\StudentController@add_student');
	Route::post('/submit_student','Admin\StudentController@submit_student');
	Route::get('/edit_student/{id}','Admin\StudentController@edit_student');
	Route::post('/update_student','Admin\StudentController@update_student');
	Route::get('/student_list','Admin\StudentController@student_list');
	Route::get('/change_student_status','Admin\StudentController@change_student_status');
	Route::post('/delete_student','Admin\StudentController@delete_student');
	Route::get('/change_student_password/{id}', 'Admin\StudentController@change_password');
	Route::post('/update_student_password', 'Admin\StudentController@update_password');
	Route::post('/StudentImportData', 'Admin\StudentController@StudentImportData');
	Route::get('/StudentExportData', 'Admin\StudentController@StudentExportData');

	Route::get('/add_tutor','Admin\TutorController@add_tutor');
	Route::post('/submit_tutor','Admin\TutorController@submit_tutor');
	Route::get('/edit_tutor/{id}','Admin\TutorController@edit_tutor');
	Route::post('/update_tutor','Admin\TutorController@update_tutor');
	Route::get('/tutor_list','Admin\TutorController@tutor_list');
	Route::get('/change_tutor_status','Admin\TutorController@change_tutor_status');
	Route::post('/delete_tutor','Admin\TutorController@delete_tutor');
	Route::get('/change_tutor_password/{id}', 'Admin\TutorController@change_password');
	Route::post('/update_tutor_password', 'Admin\TutorController@update_password');
	Route::post('/TutorImportData', 'Admin\TutorController@TutorImportData');
	Route::get('/TutorExportData', 'Admin\TutorController@TutorExportData');
	
	Route::get('/dashboard','Admin\DashboardController@index');
	Route::get('/logout', 'Admin\DashboardController@logout');
	Route::get('/logout', 'Admin\DashboardController@logout');



	
});

Route::group(['middleware' => 'user'], function() {
	Route::get('/student','DashboardController@index');
	Route::get('/logout', 'DashboardController@logout');
});

Route::get('/', function () {
    return view('home');
});

Route::post('/userlogin', 'UserController@login'); 
Route::get('/signin', 'UserController@signin'); 
Route::get('/registration', 'UserController@registration');
Route::post('/student_save', 'UserController@student_save');
Route::get('/become_a_tutors', 'UserController@become_a_tutors');
Route::post('/tutors_save', 'UserController@tutors_save');
Route::get('/verification', 'UserController@verification');
Route::post('/verifyotp', 'UserController@verifyotp');
Route::post('/forgotpass', 'UserController@forgotpass');
Route::get('/resetpass/{id}', 'UserController@resetpass');
Route::post('/password/updateforgot', 'UserController@updateforgot');
Route::get('/logout', 'Tutor\DashboardController@logout');


//Route::get('/tutor', 'TutorController@index')->name('tutor')->middleware('tutor');
//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
//Route::get('/student', 'StudentController@index')->name('user')->middleware('user');
//Route::get('/logout', 'HomeController@logout');
//Route::get('/home', 'HomeController@index');
