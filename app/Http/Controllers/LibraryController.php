<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use App\Models\Library;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class LibraryController extends Controller
{

    private Library $library;

    /**
     * Constructor for the LibraryController.
     *
     * @param  Library  $library  An instance of the Library model.
     */
    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    /**
     * Fetches all libraries in a random order.
     *
     * Returns a collection of Library instances.
     */
    private function getLibrariesInRandomOrder()
    {
        return $this->library->inRandomOrder()->get();
    }

    /**
     * Displays a listing of the libraries.
     */
    public function index(): View|Factory|JsonResponse|Application
    {
        $libraries = $this->getLibrariesInRandomOrder();

        return view('public/data', compact('libraries'));
    }

    /**
     * Displays a map of the libraries.
     */
    public function map(): View|Factory|Application
    {
        $libraries = $this->getLibrariesInRandomOrder();

        return view('public/map', compact('libraries'));
    }

    /**
     * Displays a listing of the libraries for admin.
     */
    public function admin(): Factory|View|Application
    {
        $libraries = $this->library->all();

        return view('admin/admin', compact('libraries'));
    }

    /**
     * Displays the specified library.
     *
     * @param  string  $library_name_slug  The slug of the library to display.
     */
    public function show($library_name_slug): Factory|View|Application
    {
        //NOTE find a library in the database that contains the slug in the URL
        $library_data = $this->library->where('library_name_slug', $library_name_slug)->first();

        if ($library_data === null) {
            // Log::notice('User landed on an institution that has not been added to the database:' . URL::current());
            abort(404, 'No information about this institution is available at this time. ');
        }

        return view('public.single-institution', ['library_data' => $library_data]);
    }

    /**
     * Shows the form for creating a new library.
     */
    public function create(): View|Factory|Application
    {
        return view('admin.create');
    }

    /**
     * Stores a newly created library in storage.
     *
     * @param  LibraryRequest  $request  The validated request data.
     */
    public function store(LibraryRequest $request): RedirectResponse
    {
        $library = new Library([
            'nation' => $request->input('nation'),
            'city' => $request->input('city'),
            'library' => $request->input('library'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'quantity' => $request->input('quantity'),
            'website' => $request->input('website'),
            'copyright' => $request->input('copyright'),
            'notes' => $request->input('notes'),
            'iiif' => $request->input('iiif'),
            'is_free_cultural_works_license' => $request->input('is_free_cultural_works_license'),
            'has_post' => $request->input('has_post'),
            'post_url' => $request->input('post_url'),
            'library_name_slug' => $request->input('library_name_slug'),
            'is_part_of_project_name' => $request->input('is_part_of_project_name'),
            'is_part_of' => $request->input('is_part_of'),
            'is_part_of_url' => $request->input('is_part_of_url'),
            'is_disabled' => $request->input('is_disabled'),
            'last_edited' => $request->input('last_edited'),
        ]);

        $library->save();

        Log::info('Library created: '.$library->id);

        return redirect()->route('admin')->with('success', 'A new institution has been successfully saved.');
    }

    /**
     * Shows the form for editing the specified library.
     *
     * @param  int  $id  The ID of the library to edit.
     */
    public function edit(int $id): View|Factory|Application
    {
        $library = $this->library->where('id', $id)->first();

        return view('admin.update', ['library' => $library]);
    }

    /**
     * Updates the specified library in storage.
     *
     * @param  LibraryRequest  $request  The validated request data.
     * @param  int  $id  The ID of the library to update.
     */
    public function update(LibraryRequest $request, int $id): RedirectResponse
    {
        $library = $this->library->where('id', $id)->first();
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

        $library->save();

        Log::info('Library updated: '.$library->id);

        return redirect()->back()->with('success', 'The institution has been successfully updated.');
    }

    /**
     * Removes the specified library from storage.
     *
     * @param  int  $id  The ID of the library to delete.
     */
    public function destroy(int $id): RedirectResponse
    {
        $library = $this->library->findOrFail($id);

        $library->delete();

        Log::info('Library deleted: '.$id);

        return redirect()->route('admin')->with('success', 'An institution has been successfully deleted.');
    }

    /**
     * Displays a listing of all the libraries sorted by name.
     */
    public function all(): View|Factory|Application
    {
        $libraries = $this->library->orderBy('library', 'asc')->get();

        return view('public.all', compact('libraries'));
    }
}
