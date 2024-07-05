<?php

namespace App\Http\Controllers;

use App\Models\Library;

class HomepageController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // Fetch the latest edited libraries from the database
        $latest_changes = Library::orderBy('last_edited', 'desc')->take(5)->get();

        // Pass the data to the view
        return view('landing_page', compact('latest_changes'));
    }
}
