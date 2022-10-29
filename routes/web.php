<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', [LoginController::class, 'login'])->middleware(['auth'])->name('login.index');
    
require __DIR__.'/auth.php';

Route::get('ticket/completadas', [TicketController::class, 'completadas'])->name('ticket.completadas')->middleware(['auth', 'can:user']);
Route::get('ticket/incidencias', [TicketController::class, 'incidencias'])->name('ticket.misincidencias')->middleware(['auth', 'can:user']);
Route::resource('ticket', TicketController::class)->middleware(['auth', 'can:user']);

Route::get('manage/cerradas', [ManageController::class, 'cerradas'])->name('manage.cerradas')->middleware(['auth', 'can:manage']);
Route::resource('manage', ManageController::class)->only(['index', 'show', 'edit', 'update'])->parameters(['manage' => 'ticket'])->middleware(['auth', 'can:manage']);

Route::get('profile', [ProfileController::class, 'changePassword'])->middleware(['auth'])->name('auth.change-password');
Route::post('profile', [ProfileController::class, 'updatePassword'])->middleware(['auth'])->name('auth.update-password');

Route::resource('admin/user', UserController::class)->middleware(['auth', 'can:admin']);
Route::resource('admin/location', LocationController::class)->only(['index', 'create', 'store', 'destroy'])->middleware(['auth', 'can:admin']);

Route::get('admin/ajustes', [AdminController::class, 'ajustes'])->name('admin.ajustes')->middleware(['auth', 'can:admin']);
Route::get('admin/incidencias', [AdminController::class, 'incidencias'])->name('admin.incidencias')->middleware(['auth', 'can:admin']);
Route::get('admin/pendientes', [AdminController::class, 'pendientes'])->name('admin.pendientes')->middleware(['auth', 'can:admin']);
Route::get('admin/asignadas', [AdminController::class, 'asignadas'])->name('admin.asignadas')->middleware(['auth', 'can:admin']);
Route::get('admin/completadas', [AdminController::class, 'completadas'])->name('admin.completadas')->middleware(['auth', 'can:admin']);
Route::resource('admin', AdminController::class)->parameters(['admin' => 'ticket'])->middleware(['auth', 'can:admin']);



