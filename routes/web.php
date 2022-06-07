 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
/*
Route::prefix('admin')->group(function (){

Route::get('/login',[AdminController::class, 'Index'])->name('login_from');

Route::get('/login/admin',[AdminController::class, 'Login'])->name('admin.login');

Route::get('/dashboard',[AdminController::class, 'Index'])->name('admin.dashboard');
});

*/



Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

Route::get('/user', function () {
    return view('user');
})->middleware(['auth'])->name('user');
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/user', function () {
    return view('user');
})->middleware(['auth'])->name('user');

/*Route::get('/trailers', function () {
    return view('trailers');
})->middleware(['auth'])->name('trailers');


Route::get('/cars', function () {
    return view('cars');
})->middleware(['auth'])->name('cars');
*/
Route::resource('/trailers', App\Http\Controllers\TrailerController::class);

Route::resource('/cars', App\Http\Controllers\CarController::class);

Route::resource('/usersmanagement', App\Http\Controllers\UsersManagementController::class);


require __DIR__.'/auth.php';

Route::resource('/orders', App\Http\Controllers\OrderController::class);
Route::resource('/finalOrders', App\Http\Controllers\FinalOrdersController::class);
Route::resource('/final_order_location', App\Http\Controllers\final_order_locationController::class);
//Route::post('/orders',App\Http\Controllers\SaveOrderController::class@);

