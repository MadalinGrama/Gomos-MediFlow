<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\SettingsController;
use App\Models\Appointment;

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

Route::get('/', [PageController::class, 'showHome'])->name('homeurl');

Auth::routes();

Route::middleware(['auth',])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('user.profile');
});

Route::get('/{slug}', [PageController::class, 'show']);

// Appointments 

Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/pages', [PageController::class, 'index'])->name('admin.pages.index');
    Route::get('/admin/pages/create', [PageController::class, 'create'])->name('admin.pages.create');
    Route::post('/admin/pages/store', [PageController::class, 'store'])->name('admin.pages.store');
    Route::get('/admin/pages/{page}/edit', [PageController::class, 'edit'])->name('admin.pages.edit');
    Route::post('/admin/pages/{page}/update', [PageController::class, 'update'])->name('admin.pages.update');
    Route::delete('/admin/pages/{page}/destroy', [PageController::class, 'destroy'])->name('admin.pages.destroy');
    Route::get('/admin/pages/{page}', [PageController::class, 'show'])->name('admin.pages.show'); // Adaugă această rută pentru afișare

    // Menu Group
    Route::prefix('admin')->group(function () {
        Route::get('/menu/view', [MenuController::class, 'index'])->name('admin.menu.index');
        Route::get('/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
        Route::post('/menu/store', [MenuController::class, 'store'])->name('admin.menu.store');
        Route::get('/menu/{menuItem}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
        Route::put('/menu/{menuItem}/update', [MenuController::class, 'update'])->name('admin.menu.update');
        Route::delete('/menu/{menuItem}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
    });

    // Inbox Messages from Contact Page
    Route::prefix('admin')->group(function () {
        Route::get('/inbox', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::post('/contact', [ContactController::class, 'store'])->name('admin.contact.store');
        Route::delete('/inbox/{contact}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');
        Route::get('/inbox/show-{id}', [ContactController::class, 'show'])->name('admin.contact.show');
    });

    // Settings
    Route::prefix('admin')->group(function () {
        Route::get('/general-settings', [SettingsController::class, 'index'])->name('admin.settings.index');
        Route::post('/general-settings', [SettingsController::class, 'store'])->name('admin.settings.store');

    });

    // Appointments 
    Route::prefix('admin')->group(function () {
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::get('/appointments/show-{id}', [AppointmentController::class, 'show'])->name('admin.appointments.show');
        Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('admin.appointment.destroy');

    });
});
