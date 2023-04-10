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
Route::get('/export-edit{id}', [App\Http\Controllers\Admin\ExportController::class, 'edit'])->name('export.edit');
Route::get('/export-update{id}', [App\Http\Controllers\Admin\ExportController::class, 'update'])->name('export.update');
Route::get('/export-delete{id}', [App\Http\Controllers\Admin\ExportController::class, 'destroy'])->name('export.delete');

/*
|--------------------------------------------------------------------------
| Dashboard Import Controller    *****************************************
|--------------------------------------------------------------------------
*/
Route::get('/import', [App\Http\Controllers\Admin\ImportController::class, 'index'])->name('import');
Route::get('/import-create', [App\Http\Controllers\Admin\ImportController::class, 'create'])->name('import.Create');
Route::Post('/import-store', [App\Http\Controllers\Admin\ImportController::class, 'store'])->name('import.store');
Route::get('/import-edit{id}', [App\Http\Controllers\Admin\ImportController::class, 'edit'])->name('import.edit');
Route::get('/import-update{id}', [App\Http\Controllers\Admin\ImportController::class, 'update'])->name('import.update');
Route::get('/import-delete{id}', [App\Http\Controllers\Admin\ImportController::class, 'destroy'])->name('import.delete');

/*
|--------------------------------------------------------------------------
| Dashboard Investment Controller *****************    الإستثمار
|--------------------------------------------------------------------------
*/
Route::get('/investment', [App\Http\Controllers\Admin\InvestmentController::class, 'index'])->name('investment');
Route::get('/investment-show{id}', [App\Http\Controllers\Admin\InvestmentController::class, 'show'])->name('investment.show');
Route::post('/investment-update{id}', [App\Http\Controllers\Admin\InvestmentController::class, 'update'])->name('investment.update');
Route::get('/investment-create', [App\Http\Controllers\Admin\InvestmentController::class, 'create'])->name('investment.Create');
Route::Post('/investment-store', [App\Http\Controllers\Admin\InvestmentController::class, 'store'])->name('investment.store');
Route::Post('/investment-record', [App\Http\Controllers\Admin\InvestmentController::class, 'record'])->name('investment.Record');
Route::get('/investment-delete{id}', [App\Http\Controllers\Admin\InvestmentController::class, 'destroy'])->name('investment.delete');

/*
|--------------------------------------------------------------------------
| Dashboard Investment Controller *****************    مشروعات الإستثمارية
|--------------------------------------------------------------------------
*/
Route::get('/lecturer', [App\Http\Controllers\Admin\InvestmentController::class, 'lecturer'])->name('lecturer');
Route::get('/lecturer-create', [App\Http\Controllers\Admin\InvestmentController::class, 'lecturer_create'])->name('project.create');
Route::get('/investment-record{id}', [App\Http\Controllers\Admin\InvestmentController::class, 'record'])->name('investment.record');
Route::get('/record_update{id}', [App\Http\Controllers\Admin\InvestmentController::class, 'record_update'])->name('record.update');

/*
|--------------------------------------------------------------------------
| Dashboard Sections Controller *****************    القطاعات
|--------------------------------------------------------------------------
*/
Route::get('/section', [App\Http\Controllers\Admin\SectionController::class, 'index'])->name('section');
Route::get('/section-create{id1}{id}', [App\Http\Controllers\Admin\SectionController::class, 'create'])->name('section.Create');

/*
|--------------------------------------------------------------------------
| Dashboard Auctions Controller ********************  اطروحات و مزادات
|--------------------------------------------------------------------------
*/
Route::get('/auction', [App\Http\Controllers\Auction\AuctionController::class, 'index'])->name('auction');
Route::get('/auction-create', [App\Http\Controllers\Auction\AuctionController::class, 'create'])->name('auction.Create');
Route::POST('/auction-insert', [App\Http\Controllers\Auction\AuctionController::class, 'store'])->name('auction.Store');
Route::get('/auction-edit{id}', [App\Http\Controllers\Auction\AuctionController::class, 'edit'])->name('auction.edit');
Route::POST('/auction-update{id}', [App\Http\Controllers\Auction\AuctionController::class, 'update'])->name('auction.update');

Route::get('/offer', [App\Http\Controllers\Auction\AuctionController::class, 'offer_index'])->name('offer');
Route::get('/offer-create', [App\Http\Controllers\Auction\AuctionController::class, 'offer_create'])->name('offer.Create');
Route::POST('/offer-insert', [App\Http\Controllers\Auction\AuctionController::class, 'offer_store'])->name('offer.Store');
Route::get('/offer-edit{id}', [App\Http\Controllers\Auction\AuctionController::class, 'offer_edit'])->name('offer.edit');
Route::POST('/offer-update{id}', [App\Http\Controllers\Auction\AuctionController::class, 'offer_update'])->name('offer.update');
/*
|--------------------------------------------------------------------------
| Dashboard Side Controller ****************************************
|--------------------------------------------------------------------------
*/
Route::get('/side', [App\Http\Controllers\Admin\SideController::class, 'index'])->name('side');
Route::POST('/side_store', [App\Http\Controllers\Admin\SideController::class, 'store'])->name('side.store');
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
| Dashboard report Controller ****************************************  التقارير
|--------------------------------------------------------------------------
*/
Route::get('/auction-report', [App\Http\Controllers\Report\ReportController::class, 'index'])->name('auction.report');
Route::get('/auctionReport', [App\Http\Controllers\Report\ReportController::class, 'acution_report'])->name('auctionReport');

Route::get('/request-report', [App\Http\Controllers\Report\ReportController::class, 'request_index'])->name('request.report');
Route::get('/requestReport', [App\Http\Controllers\Report\ReportController::class, 'request_report'])->name('req_report');
/*
|--------------------------------------------------------------------------
| Dashboard other Controller ****************************************
|--------------------------------------------------------------------------
*/
Route::get('/search', [App\Http\Controllers\Admin\OtherController::class, 'index'])->name('request.search');

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
