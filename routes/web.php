<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
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

// Questa è guest

Route::get('/', [PageController::class, 'index'])->name('home');


// questo è Admin
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/' ,[DashboardController::class, 'index'])->name('home');

        Route::resource('projects', ProjectController::class);
        Route::resource('technologies', TechnologyController::class);
        Route::resource('types', TypeController::class);


        // rotte custom

        Route::get('/orderby/{direction}/{column}', [ProjectController::class, 'orderBy'])->name('orderby');
        Route::get('/technologie-search/{title}', [ProjectController::class, 'searchTechnologie'])->name('searchTechnologie');
        Route::get('/type-search/{title}', [ProjectController::class, 'searchType'])->name('searchType');

    });





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
