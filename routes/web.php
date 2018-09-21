<?php



Route::get('/', function(){
    return view('welcome');
});

//Route::get('/std', function(){
   //// $student = App\Student::all();
   // return view('student')->with('student',$student);
//});

Route::post('/update', 'studentController@store');

//Route::get('/stdTable', 'studentController@index');

Route::get('/std', 'studentController@show');


//Route::get('/std/edit/{{id}}', 'studentController@edit');

Route::get('/delete', 'studentController@destroy');

//Route::get('/save', 'studentController@store');

//Route::resource('student','studentController');


Route::get('/fee', 'studentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
