<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\DifficultyController;
use App\Http\Controllers\StepController;
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

// Route::resource('/recipe', RecipeController::class)
//     ->middleware(['auth']);
    
Route::middleware('auth')->group(function () {
    Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe.index');
    Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe.create');
    Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.store');
    Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');
    Route::get('/recipe/{id}/edit', [RecipeController::class, 'edit'])->name('recipe.edit');
    Route::patch('/recipe/{id}', [RecipeController::class, 'update'])->name('recipe.update');
    Route::delete('/recipe/{id}', [RecipeController::class, 'destroy'])->name('recipe.destroy');
});
Route::resource('/step', StepController::class)
    ->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/difficulties', [DifficultyController::class, 'index'])->name('difficulty.show');
});

require __DIR__.'/auth.php';
