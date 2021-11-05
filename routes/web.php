<?php

use App\Models\Library;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

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

 //SECTION Auth
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


//SECTION Homepage

Route::get('/', function () {return view('landing_page');});
Route::get('/sample', function () {return view('index');});

//SECTION Admin pannel
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [LibraryController::class, 'admin'])->name('admin');

        Route::get('/new', [LibraryController::class, 'create'])->name('create_library');
        Route::post('/new', [LibraryController::class, 'store']);

        Route::get('/edit/{id}', [LibraryController::class, 'edit'])->name('update_library');
        Route::post('/edit/{id}', [LibraryController::class, 'update']);

        Route::delete('/record/delete/{id}', [LibraryController::class, 'destroy'])->name('delete_library');
    });
});

//SECTION public views
Route::get('/data', [LibraryController::class, 'index'])->name('data');
Route::get('/map', [LibraryController::class, 'dmmmap'])->name('map');
Route::get('/{library:library_name_slug}', [LibraryController::class, 'show'])->name('show_library');

//SECTION redirects from old DMMapp structure
Route::get('/record/{id}', RedirectController::class)->name('redirect');