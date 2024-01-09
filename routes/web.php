<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\CheckListController;
use App\Events\MainStoreEvent;
use Inertia\Inertia;

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
    return Inertia::render('trash/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('trash/Dashboard');
    })->name('dashboard');
});

Route::get('/main', [mainController::class, 'index']);
Route::post('/main/store', [mainController::class, 'store']);
Route::get('/main/show-main', [mainController::class, 'show']);

Route::get('/main/store', function() {
    event(new MainStoreEvent(''));
});

Route::get('/checklist', [CheckListController::class, 'index']);
Route::get('/checklist/show-checklist', [CheckListController::class, 'show']);

Route::get('/checklist/show-checklist', [CheckListController::class, 'show']);