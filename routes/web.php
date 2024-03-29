<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminRegistrationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/main', [mainController::class, 'index']);
// Route::post('/main/store', [mainController::class, 'store']);
// Route::get('/main/show-main', [mainController::class, 'show']);

// Route::get('/main/store', function() {
//     event(new MainStoreEvent(''));
// });

// Route::post('/main/update', [mainController::class, 'update']);

// Route::get('/checklist', [CheckListController::class, 'index']);
// Route::get('/checklist/show-checklist', [CheckListController::class, 'show']);

Route::middleware('guest')->group(function (){
    Route::get('/RegisterAdmin', [AdminRegistrationController::class, 'index'])->name('RegisterAdmin.index');

    //Route::post('/RegisterAdmin/store', [AdminRegistrationController::class, 'store']);
});

Route::post('/registerAdmin/store', [AdminRegistrationController::class, 'store']);
