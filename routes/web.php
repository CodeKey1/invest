<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard Site
|--------------------------------------------------------------------------
*/

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){

/*
|--------------------------------------------------------------------------
| Dashboard Export Controller    ******************************************
|--------------------------------------------------------------------------
*/
Route::get('/export', [App\Http\Controllers\Admin\ExportController::class, 'index'])->name('export');
Route::get('/export-create', [App\Http\Controllers\Admin\ExportController::class, 'create'])->name('export.Create');

/*
|--------------------------------------------------------------------------
| Dashboard Import Controller    *****************************************
|--------------------------------------------------------------------------
*/
Route::get('/import', [App\Http\Controllers\Admin\ImportController::class, 'index'])->name('import');
Route::get('/import-create', [App\Http\Controllers\Admin\ImportController::class, 'create'])->name('import.Create');

/*
|--------------------------------------------------------------------------
| Dashboard Investment Controller *****************    الإستثمار
|--------------------------------------------------------------------------
*/
Route::get('/investment', [App\Http\Controllers\Admin\InvestmentController::class, 'index'])->name('investment');
Route::get('/investment-show{id}', [App\Http\Controllers\Admin\InvestmentController::class, 'show'])->name('investment.show');
Route::get('/investment-create', [App\Http\Controllers\Admin\InvestmentController::class, 'create'])->name('investment.Create');
Route::Post('/investment-store', [App\Http\Controllers\Admin\InvestmentController::class, 'store'])->name('investment.store');
Route::get('/investment-delete{id}', [App\Http\Controllers\Admin\InvestmentController::class, 'destroy'])->name('investment.delete');

/*
|--------------------------------------------------------------------------
| Dashboard Investment Controller *****************    مشروعات الإستثمارية
|--------------------------------------------------------------------------
*/
Route::get('/project', [App\Http\Controllers\Admin\InvestmentController::class, 'project'])->name('project');
Route::get('/project-create', [App\Http\Controllers\Admin\InvestmentController::class, 'project_create'])->name('project.create');

/*
|--------------------------------------------------------------------------
| Dashboard Sections Controller *****************    القطاعات
|--------------------------------------------------------------------------
*/
Route::get('/section', [App\Http\Controllers\Admin\SectionController::class, 'index'])->name('section');
Route::get('/section-create', [App\Http\Controllers\Admin\SectionController::class, 'create'])->name('section.Create');

/*
|--------------------------------------------------------------------------
| Dashboard Auctions Controller ********************    المزادات
|--------------------------------------------------------------------------
*/
Route::get('/auction', [App\Http\Controllers\Admin\AuctionController::class, 'index'])->name('auction');
Route::get('/auction-create', [App\Http\Controllers\Admin\AuctionController::class, 'create'])->name('auction.Create');

/*
|--------------------------------------------------------------------------
| Dashboard Side Controller ****************************************
|--------------------------------------------------------------------------
*/
Route::get('/side', [App\Http\Controllers\Admin\SideController::class, 'index'])->name('side');
Route::get('/side-create', [App\Http\Controllers\Admin\SideController::class, 'create'])->name('side.Create');

/*
|--------------------------------------------------------------------------
| Dashboard users Controller ****************************************
|--------------------------------------------------------------------------
*/
Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('user');
Route::get('/user-create', [App\Http\Controllers\Admin\UsersController::class, 'create'])->name('user.Create');
Route::POST('/user-store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('user.store');
Route::get('/user-delete{id}', [App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('user.delete');

Route::get('/app-modify', [App\Http\Controllers\Admin\AppModifyController::class, 'index'])->name('app.modify');
Route::POST('/app-modify-create', [App\Http\Controllers\Admin\AppModifyController::class, 'create'])->name('app.create');
/*
|--------------------------------------------------------------------------
| Dashboard report Controller ****************************************
|--------------------------------------------------------------------------
*/
Route::get('/report', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('report');
/*
|--------------------------------------------------------------------------
| Dashboard other Controller ****************************************
|--------------------------------------------------------------------------
*/
Route::get('/search', [App\Http\Controllers\Admin\OtherController::class, 'index'])->name('search');

/*
|--------------------------------------------------------------------------
| Dashboard roles admin Controller ****************************************
|--------------------------------------------------------------------------
*/
Route::get('/role', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('role');
Route::get('/role-create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('role.Create');
Route::POST('/role-store', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('role.store');
Route::get('/role-delete{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('role.delete');
Route::get('/role-edit{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('role.edite');

});
