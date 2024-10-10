<?php


use App\Http\Controllers\api\AuthApiController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\OfficeController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\OrderDetailController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\StudentController;
use App\Http\Controllers\api\TaskController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::controller(StudentController::class)->group( function(){
    Route::get("helloInsideApi",  'helloInsideApi');
    // Route::get("about", 'getStudents');
    // Route::post("about", 'addStudents');
})->middleware('auth:api');






Route::controller(ProductController::class)->group(function(){

// 1st Query
Route::get('products', 'getProductsWithProductLine');
// 7th Query
Route::get('products-in-stock', 'getProductsInStock');
// 11th Query
Route::get('products-by-line/{productLine}', 'getProductsByProductLine');

})->middleware('auth:api');




Route::controller(CustomerController::class)->group(function(){

// 2nd Query
Route::get('customers', 'getCustomersWithSalesRep');
// 8th Query
Route::get('highest-credit-limit', 'getHighestCreditLimit');
// 15th Query
Route::get('customers-order-count', 'getCustomersWithOrderCount');

})->middleware('auth:api');




Route::controller(OrderController::class)->group(function(){

// 3rd Query 
Route::get('orders/{customerNumber}', 'getOrdersForCustomer');

// 9th Query
Route::get('pending-orders', 'getPendingOrders');

// 12th Query
Route::get('order-count-by-customer', 'getOrderCountByCustomer');


})->middleware('auth:api');

// ----------------------------------------------------------------------


Route::controller(PaymentController::class)->group(function(){

// 5th Query
Route::get('total-payment/{customerNumber}', 'getTotalAmountPaidByCustomer');
// 10th Query
Route::get('payments/{startDate}/{endDate}', 'getPaymentsWithinDateRange');

})->middleware('auth:api');

// ----------------------------------------------------------------------



Route::controller(OrderDetailController::class)->group(function(){
// 4th Query
Route::get('orderdetails/{orderNumber}', 'getOrderDetailsForOrder');
// 14th Query
Route::get('total-quantity/{productCode}', 'getTotalQuantityOrderedForProduct');

})->middleware('auth:api');


// ----------------------------------------------------------------------




// 6th Query
Route::get('employees/{officeCode}', [EmployeeController::class, 'getEmployeesInOffice'])->middleware('auth:api');

// 13th Query
Route::get('offices-by-country/{country}', [OfficeController::class, 'getOfficesByCountry'])->middleware('auth:api');


// ----------------------------------------------------------------------



// Regsiter and Login doesn't require middleware
Route::controller(AuthApiController::class)->group(function () {

    Route::post('register',  'register');


    Route::post('login', 'login');
});

// ----------------------------------------------------------------------


// Authenticating Routes needs middleware
Route::controller(AuthApiController::class)->group(function () {

    Route::post('logout',  'logout');

    Route::post('profile',  'profile');

    Route::post('refresh',  'refresh');

})->middleware('auth:api');

// ----------------------------------------------------------------------


// Task CRUD Routes also need Auth middleware 

Route::controller(TaskController::class)->group(function(){
    Route::post('tasks', 'create');

    Route::post('tasks/{task}/edit',  'edit');

    Route::post('tasks/{task}/assign', 'assign');

    Route::post('tasks/delete/{task}',  'delete');

})->middleware('auth:api');




