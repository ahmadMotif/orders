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
    return view('client.landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Management Routes
Route::prefix('manage')
    // Managers Group
    ->middleware('role:superadministrator|administrator|arbitrator|language_checker|technical_producer|finance|print')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', 'Manage\ManageController@dashboard')->name('manage.dashboard');
        // Customers Orders Manage
        Route::resource('/customers-orders', 'Manage\CustomersOrdersController');

        // Contract To Pdf
        Route::get('/contract', function() {
            // return view('manage.contracts.contract');

            $pdf = PDF::loadView('manage.contracts.contract');
            return $pdf->download('contract.pdf');
        });

        // Copyright To Pdf
        Route::get('/copyright', function() {
            // return view('manage.copyrights.copyright');

            $pdf = PDF::loadView('manage.copyrights.copyright');
            return $pdf->download('copyright.pdf');
        });

        // award To Pdf
        Route::get('/award', function() {
            // return view('manage.awards.award');

            $pdf = PDF::loadView('manage.awards.award');
            return $pdf->download('award.pdf');
        });

        // superadministrator Group
        Route::middleware('role:superadministrator|administrator')
            ->group( function () {
                // Employees
                Route::resource('/employees', 'Manage\EmployeesController');
                // Customers
                Route::resource('/customers', 'Manage\CustomersController');
            });
    });
// Route::prefix('manage')
//     // Managers Group
//     ->middleware('role:superadministrator|administrator|arbitrator|language_checker|finance|print')
//     ->group(function () {
//         // Dashboard
//         Route::get('/dashboard', 'Manage\ManageController@dashboard')
//             ->name('manage.dashboard');
//         // superadministrator Group
//         Route::middleware('role:superadministrator|administrator')
//             ->group( function () {
//                 // Employees
//                 Route::resource('/employees', 'Manage\EmployeesController');
//                 // Customers
//                 Route::resource('/customers', 'Manage\CustomersController');
//                 // // All Orders
//                 // Route::resource('/orders', 'Manage\OrdersController');
//             });
//         // Customers Orders Manage
//         Route::resource('/customers-orders', 'Manage\CustomersOrdersController');
//     });

// Orders Routes
Route::resource('/orders', 'Client\OrdersController')->middleware('auth');
// Comments 
Route::resource('comment', 'Client\CommentController', ['only' => ['update', 'destroy']]);
Route::post('comment/create/{order}', 'Client\CommentController@addOrderComment')->name('comment.store');
// Users Profils
Route::resource('/profile', 'UserProfileController');