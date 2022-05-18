<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SlotController;

Route::resource('slots', SlotController::class);

Route::get('tasks/{id}/slots', function() {
    return redirect('slots.index');
});

Route::get('tasks/{id}/createSlot', [SlotController::class, 'create'])
->name('createSlotFromTask');
Route::post('tasks/{id}/slots', [SlotController::class, 'store'])
->name('storeSlotFromTask');

Route::get('tasks/{id}/editSlot', [SlotController::class, 'edit'])
->name('editSlotFromTask');
Route::match(array('PUT', 'PATCH'), 'tasks/{id}/slots', [SlotController::class, 'update'])
->name('updateSlotFromTask');

Route::get('slots/{id}/delete', [SlotController::class, 'select_delete']);

Route::get('slots/create', function () {
    return redirect('slots');
});

// Route::get('tasks/{id}/slots/create', [SlotController::class, 'create']);

// Route::get('tasks/{id}/slots/{id}/delete', [SlotController::class, 'select_delete']);

Route::resource('tasks', TaskController::class);
Route::get('/tasks/{id}/delete', [TaskController::class, 'select_delete']);

Route::get('/', [PageController::class, 'home']);


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

// Route::get('/', function () {
//     return view('welcome');
// });
