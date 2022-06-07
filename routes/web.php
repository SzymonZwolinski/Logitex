 <?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/trailers', function () {
    return view('trailers');
})->middleware(['auth'])->name('trailers');


Route::get('/cars', function () {
    return view('cars');
})->middleware(['auth'])->name('cars');
*/
Route::resource('/trailers', App\Http\Controllers\TrailerController::class);

Route::resource('/cars', App\Http\Controllers\CarController::class);


require __DIR__.'/auth.php';

Route::resource('/orders', App\Http\Controllers\OrderController::class);
Route::resource('/finalOrders', App\Http\Controllers\FinalOrdersController::class);
//Route::post('/orders',App\Http\Controllers\SaveOrderController::class@);

