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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::post("/adminDashboard" , 'CustomLoginController@login');

Route::group(['middleware' => 'auth'] , function () {

    Route::get("/adminDashboard", function () {
        return view('adminDashboard');
    });
});

Route::get('/home', 'HomeController@index');
Route::get('/createAdmin' , 'CustomLoginController@createAdmin');
Route::post('/storeAdmin' , 'CustomLoginController@storeAdmin');
Route::get('/allAdmins' , 'CustomLoginController@admins');
Route::delete('/Admindestroy/{admin} ' , 'CustomLoginController@Admindestroy');


//Event Routes
Route::get('Event/search','EventController@search');
Route::get('Event/createDemo','EventController@createDemo');
Route::get('Event/monthlyEvent', 'EventController@monthlyEvent');
Route::get('Event/myevents','EventController@myevents');
Route::get('/Event/showEvent/{event}', 'EventController@showEvent');
Route::post('/Event/showEvent/{event}', 'EventController@updateImage');
Route::get('/Event/calendar', 'EventController@calendar');
Route::resource('Event' , 'EventController');

Route::post('Event/{event}/comment','CommentsController@store');
Route::get('Sport/search','SportController@search');
Route::get('Sport/createDemo','SportController@createDemo');
Route::get('Sport/enrolledStudents' , 'SportController@enrolledStudents');
Route::get('Sport/mysports','SportController@mysports');
Route::post('Sport/addStudent' , 'SportController@addStudent');
Route::delete('Sport/removeStudent' , 'SportController@removeStudent');
Route::resource('Sport' ,'SportController');

Route::get('Society/search','SocietyController@search');
Route::get('Society/createDemo','SocietyController@createDemo');
Route::get('Society/enrolledStudents' , 'SocietyController@enrolledStudents');
Route::get('Society/mysocieties','SocietyController@mysocieties');
Route::post('Society/addStudent' , 'SocietyController@addStudent');
Route::delete('Society/removeStudent' , 'SocietyController@removeStudent');
Route::resource('Society' , 'SocietyController');

Route::get('eventAdmin' , 'EventAdminController@eventAdmin');
Route::get('societyAdmin' , 'EventAdminController@societyAdmin');
Route::get('sportAdmin' , 'EventAdminController@sportAdmin');
//End of Event Routes


//inventory
Route::resource('/orders','Ordercontroller');
Route::resource('/supplier','Suppliercontroller');
Route::resource('/stationary','Stationarycontroller');
Route::resource('/labs','labscontroller');
Route::resource('/inventorysports','Sportstocks');
Route::resource('/resource','Resourcecontroller');
Route::resource('/inventoryexpenses','Inventoryexpenses');
Route::get('/inventory','homeview@index');
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');




//staff
Route::resource('academics','AcademicController');
Route::resource('nonacademics','NonAcademicController');
Route::resource('leaverequests','LeaveRequestController');
Route::resource('leaverequestsnon','LeaveRequestNonController');


//student
Route::post('/update', 'studentController@store');
Route::get('/std', 'studentController@show');
Route::get('/delete', 'studentController@destroy');
Route::get('/fee', 'studentController@store');
Route::get('/home', 'HomeController@index')->name('home');

//finance
Route::get('Budget/budget','FinanceController@budget');
Route::get('Finance/home','FinanceController@HomePage');
Route::get('Finance/bill','FinanceController@billPage');
Route::get('Water/water','FinanceController@WaterPage');
Route::get('AnnualReoprt/AnnualReport','FinanceController@AnnualReport');
Route::get('MonthlyReport/MonthlyReport','FinanceController@MonthlyReport');
Route::get('Electric/Electric','FinanceController@ElectricPage');
Route::get('Tele/Telephone','FinanceController@TelephonePage');
Route::get('Other/other','FinanceController@OtherPage');
Route::get('Funds/funds','FinanceController@FundsPage');
Route::resource('waters','WaterController');
Route::resource('electrics','ElectricController');
Route::resource('teles','TeleController');
Route::resource('budgets','BudgetController');
Route::resource('others','OtherController');
Route::resource('funds','FundsController');
Route::get('store','WaterController@store');
Route::get('show/{MonthYear}','WaterController@show');
Route::get('index','WaterController@index');
Route::post('index','WaterController@search');
Route::get('delete/{MonthYear}','WaterController@destroy');
Route::get('edit/{MonthYear}','WaterController@edit');
Route::post('/Update','WaterController@Update');
Route::get('/MonthlyReport/MonthlyReport','FinanceController@MonthlyReport');
Route::get('/AnnualReort/AnnualReport','FinanceController@AnnualReport');
Route::get('estore','ElectricController@estore');
Route::get('eshow/{MonthYear}','ElectricController@eshow');
Route::get('eindex','ElectricController@eindex');
Route::post('/eindex','ElectricController@esearch');
Route::get('Eedit/{MonthYear}','ElectricController@Eedit');
Route::post('/eupdate','ElectricController@eupdate');
Route::get('edelete/{MonthYear}','ElectricController@edestroy');
Route::get('Tstore','TeleController@Tstore');
Route::get('Tsum','TeleController@Tsum');
Route::get('Tshow/{MonthYear}','TeleController@Tshow');
Route::get('Tindex','TeleController@Tindex');
Route::post('Tindex','TeleController@Tsearch');
Route::get('Tdelete/{MonthYear}','TeleController@Tdestroy');
Route::get('Tedit/{MonthYear}','TeleController@Tedit');
Route::post('/TUpdate','TeleController@TUpdate');
Route::get('Bindex','BudgetController@Bindex');
Route::get('Bstore','BudgetController@Bstore');
Route::get('Bedit/{TypeandYear}','BudgetController@Bedit');
Route::post('/Bupdate','BudgetController@Bupdate');
Route::post('Bindex','BudgetController@Bsearch');
Route::get('BDelete/{TypeandYear}','BudgetController@Bdestroy');
Route::get('Sindex','StudentController@Sindex');
Route::get('Eindex','EventController@Eindex');
Route::get('Yindex','TotalController@Yindex');
Route::get('Lindex','LibraryController@Lindex');
Route::get('/EventRecord','billController@EventRecord');
Route::get('Lindex','LibraryController@Lindex');



Route::get('MIncome','MonthController@MIncome');
Route::get('Income','YearController@Income');

Route::group(['middleware' =>['web']],function (){
    Route::get('/Tstore',['uses'=>'TeleController@Tstore','as'=>'Tstore']);

});


Route::group(['middleware' =>['web']],function (){
    Route::get('/store',['uses'=>'WaterController@store','as'=>'store']);

});

Route::group(['middleware' =>['web']],function (){
    Route::get('/estore',['uses'=>'ElectricController@estore','as'=>'estore']);

});


Route::group(['middleware' =>['web']],function (){
    Route::get('/fstore',['uses'=>'FundsController@fstore','as'=>'fstore']);

});

Route::group(['middleware' =>['web']],function (){
    Route::get('/Astore',['uses'=>'AcademicController@Astore','as'=>'Astore']);

});

Route::group(['middleware' =>['web']],function (){
    Route::get('/Nstore',['uses'=>'NonAcademicController@Nstore','as'=>'Nstore']);

});

Route::group(['middleware' =>['web']],function (){
    Route::get('/fstore',['uses'=>'FundsController@fstore','as'=>'fstore']);

});

Route::group(['middleware' =>['web']],function (){
    Route::get('/Ostore',['uses'=>'OtherController@Ostore','as'=>'Ostore']);

});
Route::get('Yindex','YearController@Yindex');
Route::get('Mindex','MonthController@Mindex');
Route::get('MonthlyRange','MonthController@MonthlyRange');
Route::get('fstore','FundsController@fstore');
Route::get('fshow/{MonthYear}','FundsController@fshow');
Route::get('findex','FundsController@findex');
Route::post('findex','FundsController@fsearch');
Route::get('fdelete/{FundNameMonthYear}','FundsController@fdestroy');
Route::get('fedit/{FundNameMonthYear}','FundsController@fedit');
Route::post('/fUpdate','FundsController@fUpdate');
Route::get('Oindex','OtherController@Oindex');
Route::post('Oindex','OtherController@Osearch');
Route::get('Odelete/{FundNameMonthYear}','OtherController@Odestroy');
Route::get('Oedit/{FundNameMonthYear}','OtherController@Oedit');
Route::post('/OUpdate','OtherController@OUpdate');