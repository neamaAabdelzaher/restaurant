<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Auth\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[VisitorController::class,'index'])->name('visitorPage');
Route::post('/filter',[VisitorController::class,'filter'])->name('filter');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

     Route::get('/login',[LoginController::class,'showLoginForm']);
     Route::get('/register',[RegisterController::class,'showRegistrationForm']);
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Dashboard route
Route::group(['prefix' => 'dashboard', "as" => "dashboard"], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('.index');
    Route::group(['prefix' => 'orders', 'as' => '.orders.'], function () {
    Route::get('/', [OrdersController::class, 'index'])->name('index');
    Route::patch('status/{order_id}', [OrdersController::class, 'orderStatus'])->name('status');

 
  });

  // categories route
    Route::group(['prefix' => 'categories', 'as' => '.categories.'], function () {
      Route::get('/', [CategoriesController::class, 'index'])->name('index');
      Route::get('/create', [CategoriesController::class, 'create'])->name('create');
      Route::post('/store', [CategoriesController::class, 'store'])->name('store');
      Route::get('/edit/{cat_id}', [CategoriesController::class, 'edit'])->name('edit');
      Route::put('/update/{cat_id}', [CategoriesController::class, 'update'])->name('update');
      Route::get('/delete/{cat_id}', [CategoriesController::class, 'destroy'])->name('delete');

    });
      // meals route
    Route::group(['prefix' => 'meals', 'as' => '.meals.'], function () {
      Route::get('/', [MealsController::class, 'index'])->name('index');
      Route::get('/create', [MealsController::class, 'create'])->name('create');
      Route::post('/store', [MealsController::class, 'store'])->name('store');
      Route::get('/edit/{meal_id}', [MealsController::class, 'edit'])->name('edit');
      Route::put('/update/{meal_id}', [MealsController::class, 'update'])->name('update');
      Route::get('/delete/{meal_id}', [MealsController::class, 'destroy'])->name('delete');
 
  });

});


Route::group(['prefix' => 'restaurant', "as" => "restaurant"], function () {

  Route::get('/', [RestaurantController::class, 'index'])->name('.index');
  Route::post('/filter', [RestaurantController::class, 'filter'])->name('.filter');
  Route::get('/meal-details/{meal_id}', [RestaurantController::class, 'show'])->name('.meal-details');
  Route::post('/order/store', [OrdersController::class, 'store'])->name('.store');
  Route::get('/order/show', [OrdersController::class, 'show'])->name('.show');
  
});




