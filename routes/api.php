<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarkController;
use App\Illuminate\Http\Controller\Controller;
use App\Http\Controllers\LessonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// login and register
/*
Authentication Routes
POST /auth/register
Controller Method: createUser in UserController
Description: يتيح هذا الراوت تسجيل مستخدم جديد.
POST /auth/login
Controller Method: loginUser in UserController
Description: يتيح هذا الراوت تسجيل دخول المستخدم.

*/
Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/auth/login', [UserController::class, 'loginUser']);

// student 
/*
Students Routes
GET /students
Controller Method: index in StudentController
Description: يُظهر جميع الطلاب المسجلين في النظام.
POST /students
Controller Method: store in StudentController
Description: يتيح هذا الراوت إضافة طالب جديد إلى النظام.
GET /students/{id}
Controller Method: show in StudentController
Description: يُظهر معلومات حول طالب محدد بناءً على معرف فريد.
PUT /students/{id}
Controller Method: update in StudentController
Description: يتيح هذا الراوت تحديث بيانات طالب محدد.
DELETE /students/{id}
Controller Method: destroy in StudentController
Description: يتيح هذا الراوت حذف طالب من النظام.
*/
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

/*
Marks Routes
GET /marks
Controller Method: index in MarkController
Description: يُظهر جميع علامات الطلاب المسجلة في النظام.
POST /marks
Controller Method: store in MarkController
Description: يتيح هذا الراوت إضافة علامة جديدة لطالب محدد.
GET /marks/{id}
Controller Method: show in MarkController
Description: يُظهر معلومات حول علامة محددة بناءً على معرف فريد.
PUT /marks/{id}
Controller Method: update in MarkController
Description: يتيح هذا الراوت تحديث بيانات علامة محددة.
DELETE /marks/{id}
Controller Method: destroy in MarkController
Description: يتيح هذا الراوت حذف علامة من النظام.
*/
Route::get('/mark', [MarkController::class, 'index']);
Route::post('/mark', [MarkController::class, 'store']);
Route::get('/mark/{id}', [MarkController::class, 'show']);
Route::put('/mark/{id}', [MarkController::class, 'update']);
Route::delete('/mark/{id}', [MarkController::class, 'destroy']);

/*
Lessons Routes
GET /lessons
Controller Method: index in LessonController
Description: يُظهر قائمة جميع الدروس المتاحة.
POST /lessons
Controller Method: store in LessonController
Description: يتيح هذا الراوت حفظ درس جديد في قاعدة البيانات.
GET /lessons/{id}/edit
Controller Method: edit in LessonController
Description: يُظهر صفحة لتحرير درس محدد بناءً على معرف فريد.
PUT /lessons/{id}
Controller Method: update in LessonController
Description: يتيح هذا الراوت تحديث بيانات درس محدد.
DELETE /lessons/{id}
Controller Method: destroy in LessonController
Description: يتيح هذا الراوت حذف درس من النظام.
*/

Route::get('/lessons', [LessonController::class, 'index']);
Route::get('/lessons/{id}', [LessonController::class, 'show']);
Route::post('/lessons', [LessonController::class, 'store']);
Route::get('/lessons/{id}/edit', [LessonController::class, 'edit']);
Route::put('/lessons/{id}', [LessonController::class, 'update']);
Route::delete('/lessons/{id}', [LessonController::class, 'destroy']);
