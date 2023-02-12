<?php

use App\Http\Controllers\BrokenURLsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\RandomInstitutionController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

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
Route::get('/', function () {
    return view('landing_page');
});

//SECTION public views
Route::get('/data', [LibraryController::class, 'index'])->name('data');
Route::get('/{library:library_name_slug}', [LibraryController::class, 'show'])->name('show_library');

Route::get('/explore', RandomInstitutionController::class)->name('random_library');

//SECTION redirects from old DMMapp structure
Route::get('/record/{id}', RedirectController::class)->name('redirect');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//SECTION Admin panel
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/home', [LibraryController::class, 'admin'])->name('admin');
        Route::get('/new', [LibraryController::class, 'create'])->name('create_library');
        Route::post('/new', [LibraryController::class, 'store']);
        Route::get('/edit/{id}', [LibraryController::class, 'edit'])->name('update_library');
        Route::post('/edit/{id}', [LibraryController::class, 'update']);
        Route::delete('/delete/{id}', [LibraryController::class, 'destroy'])->name('delete_library');

        Route::get('/broken-links', [BrokenURLsController::class, 'index'])->name('broken-links');
        Route::get('/jobs/check-broken-links', [BrokenURLsController::class, 'executeJob'])->name('check_broken_links');

        Route::get('/logs', [LogViewerController::class, 'index'])->name('log_viewer');

    });

});
