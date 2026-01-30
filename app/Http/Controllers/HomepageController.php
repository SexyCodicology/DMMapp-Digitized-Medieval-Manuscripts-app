<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class HomepageController extends Controller
{
    /**
     * Display the homepage with the latest library changes.
     */
    public function index(): View
    {
        try {
            // Get the latest changes directly from the database
            $latest_changes = Library::orderBy('last_edited', 'desc')->take(5)->get();

            // Pass the data to the view
            return view('landing_page', compact('latest_changes'));
        } catch (Exception $e) {
            // Log the error
            Log::error('Failed to load homepage data: ' . $e->getMessage());

            // Return the view with an empty collection
            return view('landing_page', ['latest_changes' => collect()]);
        }
    }
}
