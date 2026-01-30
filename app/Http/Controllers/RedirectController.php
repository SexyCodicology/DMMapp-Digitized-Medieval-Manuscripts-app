<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class RedirectController extends Controller
{
    /**
     * Handle the redirect request for a library.
     *
     * @param Request $request The incoming HTTP request
     * @param int|string $id The ID of the library to redirect to
     *
     * @throws ValidationException If the ID is invalid
     */
    public function __invoke(Request $request, $id): Redirector|Application|RedirectResponse
    {
        // Validate the ID is numeric
        if (!is_numeric($id)) {
            abort(404, 'Invalid library ID');
        }

        // Try to get the library from cache or database
        $library = Cache::remember("library_{$id}", now()->addHour(), function () use ($id) {
            return Library::findOrFail($id);
        });

        // Get the slug and redirect (301 = permanent redirect)
        $slug = $library->library_name_slug;

        // Log the redirect if needed
        // \Log::info("Redirected from ID {$id} to slug {$slug}");

        return redirect()->to('/' . $slug, 301);
    }
}
