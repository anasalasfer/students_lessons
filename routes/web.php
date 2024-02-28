<?php

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

Route::get('/', function () {
    return view('welcome');
});

// في ملف routes/web.php

use App\Http\Controllers\LessonController;

Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('/lessons', [LessonController::class, 'store'])->name('lessons.store');
Route::get('/lessons/{id}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
Route::put('/lessons/{id}', [LessonController::class, 'update'])->name('lessons.update');
Route::delete('/lessons/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');

// في ملف routes/web.php

