<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class LibraryController extends Controller
{
    //
    /**
     * @var Library
     */
    private Library $library;

    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    /**
     * @return Application|Factory|View|JsonResponse
     */
    public function index(): View|Factory|JsonResponse|Application
    {
        $libraries = Library::inRandomOrder()->get();
        return view('public/data', compact('libraries'));
    }

    /**
     * @return Application|Factory|View
     */
    public function map()
    {
        $libraries = Library::inRandomOrder()->get();
        return view('public/map', compact('libraries'));
    }


    public function admin(): Factory|View|Application
    {

        $libraries = Library::all();
        return view('admin/admin', compact('libraries'));

    }

    public function show($library_name_slug): Factory|View|Application
    {
        try {
            //NOTE find a library in the database that contains the slug in the URL
            $library_data = Library::where('library_name_slug', $library_name_slug)->firstOrFail();
            //NOTE and now, we pass the library data to display it to the public.

        } catch (Throwable) {
            //Log::notice('User landed on an institution that has not been added to the database:' . URL::current());
            abort(404, 'No information about this institution is available at this time. ');
        }
        return view('public.single-institution', ['library_data' => $library_data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     *@throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nation' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'library' => 'required|string|max:255',
            'lat' => 'required|string|max:10',
            'lng' => 'required|string|max:10',
            'quantity' => 'required|string',
            'website' => 'required|active_url|max:255',
            'copyright' => 'required|string|max:255',
            'notes' => 'nullable|max:255',
            'iiif' => 'required|boolean',
            'is_free_cultural_works_license' => 'required|boolean',
            'has_post' => 'required|boolean',
            'post_url' => 'nullable|active_url',
            'library_name_slug' => 'required|max:255|unique:libraries',
            'is_part_of' => 'nullable|max:255',
            'is_part_of_url' => 'nullable|active_url',
        ]);

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
            'is_part_of' => $request->input('is_part_of'),
            'is_part_of_url' => $request->input('is_part_of_url'),
        ]);

        try {
            $library->save();
        } catch (Throwable $e) {
            Log::error('Unable to add a new library to the database:' . $e);
            return redirect()->route('create_library')->with("error", "Something went wrong and the library could not be saved. Check the logs.");
        }
        return redirect()->route('admin')->with("success", "A new institution has been successfully saved.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $library = Library::where('id', $id)->first();
        //dd($library);

        return view('admin.update', ['library' => $library]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        {
            $request->validate([
                'nation' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'library' => 'required|string|max:255',
                'lat' => 'required|string|max:10',
                'lng' => 'required|string|max:10',
                'quantity' => 'required|string',
                'website' => 'required|active_url|max:255',
                'copyright' => 'required|string|max:255',
                'notes' => 'nullable|max:255',
                'iiif' => 'required|boolean',
                'is_free_cultural_works_license' => 'required|boolean',
                'has_post' => 'required|boolean',
                'post_url' => 'nullable|active_url',
                'library_name_slug' => 'required|max:255|unique:libraries,library_name_slug,' . $id,
                'is_part_of' => 'nullable|max:255',
                'is_part_of_url' => 'nullable|active_url',
            ]);

            { $library = Library::where('id', $id)->first();

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

                try {
                    $library->save();
                } catch (Throwable $e) {
                    Log::error('Unable to update institution to the database: ' . $e);
                    return redirect()->route('create_library')->with("error", "Something went wrong and the institution could not be saved. Check the logs.");
                }
            }

            return redirect()->route('admin')->with("success", "An institution has been successfully updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $library = Library::findOrFail($id);

        try {
            $library->delete();
            return redirect()->route('admin')->with("success", "An institution has been successfully deleted.");

        } catch (Throwable $e) {

            Log::error('Unable delete library from the database:' . $e);
            return redirect()->route('admin')->with("error", "Something went wrong and the library could not be deleted. Check the logs.");
        }

    }

}
