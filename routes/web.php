<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\FinanceiroController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calendario', [CalendarController::class, 'index'])->name('calendar.index');

    Route::get('/getEvents', [CalendarController::class, 'getCalendarFilter'])->name('calendar.getCalendar');

    Route::get('/calendario/{id}', [CalendarController::class, 'show'])->name('calendar.show');
    Route::post('/calendario', [CalendarController::class, 'store'])->name('calendar.store');

    Route::get('/relatorios', [CalendarController::class, 'relatorios'])->name('calendar.relatorios');

    Route::get('/whatsapp', [WhatsappController::class, 'show'])->name('whatsapp.show');
    Route::post('/whatsapp', [WhatsappController::class, 'store'])->name('whatsapp.send');

    Route::group(['prefix' => 'financeiro'], function () {
        Route::get('/', [FinanceiroController::class, 'index'])->name('financeiro.index');
        Route::get('/{id}', [FinanceiroController::class, 'show'])->name('financeiro.show');
        Route::post('/', [FinanceiroController::class, 'store'])->name('financeiro.store');
    });
});
require __DIR__.'/auth.php';
