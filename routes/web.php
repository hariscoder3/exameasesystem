<?php
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UmcController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ExamController::class, 'index'])->name('exam.index');

Route::get('/addExam', [ExamController::class, 'create'])->name('exam.create');
Route::post('/store',  [ExamController::class, 'store'])->name('exam.store');
Route::get('/umc/addUMC',  [UmcController::class, 'create'])->name('umc.create');
Route::get('/umc/storeUMC',  [UmcController::class, 'storeUMC'])->name('umc.storeUMC');
Route::get('/showUMC',  [UmcController::class, 'show'])->name('umc.show');
Route::get('/umc/{id}/delete-umc', [UmcController::class, 'delete'])->name('delete-umc.delete');
Route::get('/running-exam', [ExamController::class, 'runningExam'])->name('runExam.viewExam');
Route::post('/exam/edit-exam', [ExamController::class, 'update'])->name('edit-exam.update');
Route::get('/exam/{id}/edit-exam', [ExamController::class, 'edit'])->name('edit-exam.edit');
Route::get('/exam/{id}/delete-exam', [ExamController::class, 'delete'])->name('delete-exam.delete');