<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Library;

class RandomInstitutionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        //NOTE fetch a random library from the database
        $get_random_library = Library::inRandomOrder()
        ->limit(1)
        ->get();

        $library_name_slug = $get_random_library[0]['library_name_slug'];

        return redirect()->route('show_library', ['library' => $library_name_slug]);
    }
}
