<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/registered', 'CustomAuthController@index');
Route::get('/register', 'CustomAuthController@showRegisterForm')->name('register');
Route::post('/register', 'CustomAuthController@register')->name('custom.register');
Route::post('/activate','CustomAuthController@activate')->name('activate');
Route::post('/deactivate','CustomAuthController@deactivate')->name('deactivate');

Route::get('/user-search','CustomAuthController@search')->name('search.user');

Route::get('/takequizboard','TakeQuizController@index');
Route::post('/takequizboard','TakeQuizController@takeQuizBoard')->name('take.quiz.board');

Route::get('/overview','ProfileController@index');
Route::get('/edit-info','ProfileController@index');
Route::get('/edit-password','ProfileController@index');
Route::post('/update-profile', 'ProfileController@updateProfile')->name('update.profile');
Route::post('/update-password', 'ProfileController@updatePassword')->name('update.password');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/view-questions/{id}', 'DashboardController@viewQuestions')->name('view.questions');
Route::post('/approved','DashboardController@approved')->name('approved');
Route::post('/disapproved','DashboardController@disapproved')->name('disapproved');

Route::get('/viewdisapproved','DisappoveController@index');
Route::get('/viewApproved','DisappoveController@approved');


Route::get('/addquestion','AddQuestionController@addquestion')->name('addquestion');
Route::post('/addquestions','AddQuestionController@addquestions')->name('addquestions');
Route::get('/addquestion2','AddQuestionController@addquestion2')->name('addquestion2');
Route::post('/addquestions2','AddQuestionController@addquestions2')->name('addquestions2');

Route::get('/drag','DragController@index')->name('drag');

Route::get('/cable','CableController@index');

Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/questions2', 'QuestionController@index2')->name('questions2');
Route::get('/questiondashboard', 'QuestionController@dash')->name('questiondashboard');

//Route::get('/logout', 'LogoutController@logout')->name('finish');

Route::post('/summary-result', 'summaryController@summaryResult')->name('summaryResult');

Route::get('/sum-print', 'SumPrintController@index');
Route::get('/print-sum/{search}', 'SumPrintController@printSum')->name('print.sum');
Route::get('/search-sum', 'SumPrintController@searchSum')->name('search.sum');

Route::get('/tutorial','TutorialController@index');

Route::post('/sys-unit','ModuleController@sysUnit')->name('sys.unit');
Route::post('/cable-arrg','ModuleController@cableArrg')->name('cable.arrg');
