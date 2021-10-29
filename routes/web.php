<?php

use App\Http\Controllers\LibraryController;
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
    Route::get('/admin', [LibraryController::class, 'admin'])->name('admin');

    Route::get('/admin/record/new', [LibraryController::class, 'newLibrary'])->name('new_library');
    Route::post('/admin/record/new', [LibraryController::class, 'newLibrary'])->name('create_library');

    Route::get('/admin/record/edit/{library_id}', [LibraryController::class, 'modify'])->name('modify_library');
    Route::post('/admin/record/edit/{library_id}', [LibraryController::class, 'modify'])->name('update_library');

    Route::get('/admin/search', [LibraryController::class, 'searchadmin']);

    Route::delete('/admin/record/delete/{library_id}', [LibraryController::class, 'destroy'])->name('delete_library');
});

//SECTION public views
Route::get('/data', [LibraryController::class, 'index'])->name('data');
Route::get('/map', [LibraryController::class, 'dmmmap'])->name('map');
Route::get('/{library_name_slug}', [LibraryController::class, 'show'])->name('show_library');
Route::get('/search', [LibraryController::class, 'search']);

//SECTION redirects from old DMMapp structure
Route::get('/record/{id}', RedirectController::class)->name('redirect');

