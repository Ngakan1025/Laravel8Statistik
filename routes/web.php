<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkorController;

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

Route::get('/skor', [SkorController::class, 'index'])->name('skor');
Route::get('/skor/add', [SkorController::class, 'add']);
Route::post('/skor/insert', [SkorController::class, 'insert']);
Route::get('/skor/edit/{id}', [SkorController::class, 'edit']);
Route::post('/skor/update/{id}', [SkorController::class, 'update']);
Route::get('/skor/delete/{id}', [SkorController::class, 'delete']);
Route::get('/skor/export', [SkorController::class, 'export']);
Route::post('/skor/import', [SkorController::class, 'import'])->name('skor.import');

Route::get('/databergolong', [SkorController::class, 'databergolong']);

Route::get('/normalisasichikuadrat', [SkorController::class, 'chikuadrat']);

Route::get('/normalisasililliefors', [SkorController::class, 'lilliefors']);

Route::get('/korelasiMoment', [SkorController::class, 'korelasiMoment']);
Route::post('/korelasiMoment', [SkorController::class, 'storeMoment']);
Route::delete('/hapusMoment/{id}', [SkorController::class, 'deleteMoment']);
Route::get('/exportmoment', [SkorController::class, 'exportmoment']);
Route::post('/importmoment', [SkorController::class, 'importmoment']);

Route::get('/korelasiBiserial', [SkorController::class, 'korelasiBiserial']);
Route::get('/exportbiserial', [SkorController::class, 'exportbiserial']);
Route::post('/importbiserial', [SkorController::class, 'importbiserial']);

Route::get('/ujiTBerkolerasi', [SkorController::class, 'ujiTBerkolerasi']);
Route::post('/ujiTBerkolerasi', [SkorController::class, 'storeX1X2']);
Route::delete('/hapus/{id}', [SkorController::class, 'deleteT']);
Route::get('/exportujiT', [SkorController::class, 'ujiTBerkolerasiExport']);
Route::post('/ujiTBerkolerasiImport', [SkorController::class, 'ujiTBerkolerasiImport']);

Route::get('/ujiAnava', [SkorController::class, 'ujiAnava']);
Route::get('/exportAnava', [SkorController::class, 'exportAnava']);
Route::post('/importAnava', [SkorController::class, 'importAnava']);
Route::delete('/hapusAnava/{id}', [SkorController::class, 'deleteAnava']);
Route::post('/ujiAnava', [SkorController::class, 'storeAnava']);