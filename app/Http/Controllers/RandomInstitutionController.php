<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RandomInstitutionController extends Controller
{
    /**
     * Redirects to a randomly selected active library page.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $randomLibrary = Library::where('is_disabled', false)
            ->inRandomOrder()
            ->first();

        if (! $randomLibrary) {
            abort(Response::HTTP_NOT_FOUND, 'No active libraries found.');
        }

        return redirect()->route('show_library', ['library' => $randomLibrary->library_name_slug]);
    }
}
