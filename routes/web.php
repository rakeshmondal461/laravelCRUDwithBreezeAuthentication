<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\TempBillDetailsController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/add', function () {
    return view('addCustomer');
});



Route::get('/addCategory', function () {
    return view('addCategory');
})->middleware(['auth'])->name('addCategory');

Route::get('/view', [CustomerController::class, 'loadHomePage']);
Route::post('/addCustomer', [CustomerController::class, 'addCustomer']);
Route::post('/customersManipulate', [CustomerController::class, 'customersDataManipulate']);
Route::post('/updateCustomer', [CustomerController::class, 'updateCustomer']);
Route::get('/searchData', [CustomerController::class, 'searchData'])->name('live_search.action');

Route::get('/addProduct', [ProductController::class, 'loadPrimaryData']);
Route::post('/saveProduct', [ProductController::class, 'saveProduct']);
Route::get('/viewProduct', [ProductController::class, 'loadProducts']);
Route::post('/productDataManipulate', [ProductController::class, 'productDataManipulate']);
Route::post('/updateProduct', [ProductController::class, 'updateProduct']);
Route::get('/searchProduct', [ProductController::class, 'searchData'])->name('live_search_product.action');

Route::post('/saveCategory', [CategoryController::class, 'saveCategory']);
Route::get('/viewCategory', [CategoryController::class, 'loadCategory']);
Route::post('/categoryDataManipulate', [CategoryController::class, 'categoryDataManipulate']);
Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);
Route::get('/searchCategory', [CategoryController::class, 'searchData'])->name('live_search_category.action');


Route::post('/submitBilling', [BillingController::class, 'submitBilling']);
Route::get('/createBill', [BillingController::class, 'loadBillingPage']);
Route::get('getProducts/{id}',[BillingController::class, 'getProductsByCategory']);
Route::get('getProductPrice/{id}',[BillingController::class, 'getProductPriceByProductId']);

Route::get('/showBill', [BillingController::class, 'loadBillings']);
Route::get('/allbill', [BillingController::class, 'loadBillings']);

Route::get('/getTempBillDetails', [TempBillDetailsController::class, 'loadTempBillDetails'])->name('getTempBillDetails.action');
Route::get('/saveTempBillDetails', [TempBillDetailsController::class, 'saveTempBillDetails']);
Route::get('/deleteTempBillDetails/{id}', [TempBillDetailsController::class, 'deleteTempBillDetails']);






require __DIR__.'/auth.php';
