<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use App\Models\Library;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class LibraryController extends Controller
{
    /**
     * Number of latest libraries to display
     */
    private const LATEST_LIBRARIES_COUNT = 5;

    /**
     * Library model instance.
     */
    private Library $library;

    /**
     * Constructor for the LibraryController.
     *
     * @param Library $library An instance of the Library model.
     */
    public function __construct(Library $library)
    {
        $this->library = $library;
        $this->middleware('auth')->only(['admin', 'create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Displays a listing of the libraries.
     */
    public function index(): View
    {
        $libraries = $this->library->inRandomOrder()->get();
        $latest_changes = $this->getLatestChanges();

        return view('public/data', compact('libraries', 'latest_changes'));
    }

    /**
     * Displays a map of the libraries.
     */
    public function map(): View
    {
        $libraries = $this->library->inRandomOrder()->get();
        $latest_changes = $this->getLatestChanges();

        return view('public/map', compact('libraries', 'latest_changes'));
    }

    /**
     * Displays a listing of the libraries for admin.
     */
    public function admin(): View
    {
        $libraries = $this->library->all();

        return view('admin/admin', compact('libraries'));
    }

    /**
     * Displays the specified library.
     *
     * @param string $library_name_slug The slug of the library to display.
     */
    public function show(string $library_name_slug): View
    {
        $library_data = $this->library->where('library_name_slug', $library_name_slug)->firstOrFail();

        return view('public.single-institution', compact('library_data'));
    }

    /**
     * Shows the form for creating a new library.
     */
    public function create(): View
    {
        return view('admin.create');
    }

    /**
     * Stores a newly created library in storage.
     *
     * @param LibraryRequest $request The validated request data.
     */
    public function store(LibraryRequest $request): RedirectResponse
    {
        $library = new Library();
        $this->setLibraryAttributes($library, $request);
        $library->save();

        Log::info('Library created', ['id' => $library->id, 'name' => $library->library]);

        return redirect()->route('admin')->with('success', 'A new institution has been successfully saved.');
    }

    /**
     * Shows the form for editing the specified library.
     *
     * @param int $id The ID of the library to edit.
     */
    public function edit(int $id): View
    {
        $library = $this->library->findOrFail($id);

        return view('admin.update', compact('library'));
    }

    /**
     * Updates the specified library in storage.
     *
     * @param LibraryRequest $request The validated request data.
     * @param int $id The ID of the library to update.
     */
    public function update(LibraryRequest $request, int $id): RedirectResponse
    {
        $library = $this->library->findOrFail($id);
        $this->setLibraryAttributes($library, $request);
        $library->save();

        Log::info('Library updated', ['id' => $library->id, 'name' => $library->library]);

        return redirect()->route('admin')->with('success', 'The institution has been successfully updated.');
    }

    /**
     * Removes the specified library from storage.
     *
     * @param int $id The ID of the library to delete.
     */
    public function destroy(int $id): RedirectResponse
    {
        $library = $this->library->findOrFail($id);
        $libraryName = $library->library;

        $library->delete();

        Log::info('Library deleted', ['id' => $id, 'name' => $libraryName]);

        return redirect()->route('admin')->with('success', 'An institution has been successfully deleted.');
    }

    /**
     * Displays a listing of all the libraries sorted by name.
     */
    public function all(): View
    {
        $libraries = $this->library->orderBy('library', 'asc')->get();

        return view('public.all', compact('libraries'));
    }

    /**
     * Gets the latest changed libraries.
     *
     * @return Collection
     */
    private function getLatestChanges()
    {
        return $this->library->orderBy('last_edited', 'desc')
            ->take(self::LATEST_LIBRARIES_COUNT)
            ->get();
    }

    /**
     * Sets attributes on a library model from a request.
     *
     * @param Library $library The library model to update.
     * @param LibraryRequest $request The request containing the new values.
     * @return void
     */
    private function setLibraryAttributes(Library $library, LibraryRequest $request): void
    {
        $library->nation = $request->input('nation');
        $library->city = $request->input('city');
        $library->library = $request->input('library');
        $library->lat = $request->input('lat');
        $library->lng = $request->input('lng');
        $library->quantity = $request->input('quantity');
        $library->website = $request->input('website');
        $library->copyright = $request->input('copyright');
        $library->notes = $request->input('notes');
        $library->iiif = $request->input('iiif');
        $library->is_free_cultural_works_license = $request->input('is_free_cultural_works_license');
        $library->has_post = $request->input('has_post');
        $library->post_url = $request->input('post_url');
        $library->library_name_slug = $request->input('library_name_slug');
        $library->is_part_of = $request->input('is_part_of');
        $library->is_part_of_url = $request->input('is_part_of_url');
        $library->is_part_of_project_name = $request->input('is_part_of_project_name');
        $library->is_disabled = $request->input('is_disabled');
        $library->last_edited = $request->input('last_edited');
    }
}
