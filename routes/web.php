<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Models\Plant;

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
    $plants = Plant::all();
    $response = Http::get('https://mannicoon.com/api/cats?limit=5');
    $cats = json_decode($response, true);

    $friendResponse = Http::get('https://yl5.tak21tanak.itmajakas.ee/data');
    $friendPlanes = json_decode($friendResponse, true);

    return view('dashboard', ['plants' => $plants, 'cats' => $cats, 'friendPlanes' => $friendPlanes]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("data", [PlantController::class, 'getData']);

Route::get("data/other", [PlantController::class, 'getOtherData'])->name('plant.other');

Route::post("dashboard", [PlantController::class, 'store'])->name('plant.store');

require __DIR__.'/auth.php';
