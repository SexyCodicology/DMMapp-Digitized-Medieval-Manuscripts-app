<?php

namespace App\Http\Controllers;

use App\Models\Library as Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Throwable;

class LibraryController extends Controller
{
    //
    /**
     * @var Library
     */
    private $library;

    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    public function index()
    {
        $data = [];

        $data['libraries'] = $this->library->all();

        return view('public/data', $data);
    }

    public function dmmmap()
    {
        $data = [];

        $data['libraries'] = $this->library->all();

        return view('public/map', $data);
    }

    //TODO do we need this function? We are searching via datatables / frontend anyway. "Searchadmin" should stay then.

    public function search(Request $request)
    {
        $search = $request->get('search');
        //TODO why are we using DB here?
        $libraries = DB::table('libraries')->where('library', 'like', '%' . $search . '%')->paginate(10);
        return view('public/data', ['libraries' => $libraries]);

    }

    public function admin()
    {

        $data = [];

        $data['libraries'] = $this->library->all();

        return view('admin/admin', $data);

    }

    public function destroy($id)
    {
        $library = Library::findOrFail($id);

        try {
            $library->delete();
            return redirect('admin')->with("success", "An institution has been successfully deleted.");

        } catch (Throwable $e) {

            Log::error('Unable delete library from the database:' . $e);
            //TODO check if the view has an "error" and a "success section"
            return redirect()->route('create_library')->with("error", "Something went wrong and the library could not be deleted. Check the logs.");
        }

    }

    public function show($library_name_slug)
    {
        try {
            //NOTE find a library in the database that contains the slug in the URL
            $library_data = Library::where('library_name_slug', $library_name_slug)->firstOrFail();
            //NOTE and now, we pass the library data to display it to the public.

        } catch (Throwable $e) {
            Log::notice('User landed on a institution that has not been added to the database:' . URL::current());
            //TODO publish personalized error pages

            abort(404, 'No information about this institution is available at this time. ');
        }
        return view('public.single-institution', ['library_data' => $library_data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'library_name_slug' => 'required|max:255',
            'is_part_of' => 'nullable|max:255',
            'is_part_of_url' => 'nullable|active_url',
        ]);

        $library = new Library ([
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
            //TODO check if the view has an "error" and a "success section"
            return redirect()->route('create_library')->with("error", "Something went wrong and the library could not be saved. Check the logs.");
        }
        return redirect()->route('admin')->with("success", "A new institution has been successfully saved.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.modify');
    }

    public function modify(Request $request, $library_id)
    {
        $data = [];
        $data['library_id'] = $library_id;
        $library_data = $this->library->find($library_id);
        $data['nation'] = $library_data->nation;
        $data['city'] = $library_data->city;
        $data['library'] = $library_data->library;
        $data['lat'] = $library_data->lat;
        $data['lng'] = $library_data->lng;
        $data['quantity'] = $library_data->quantity;
        $data['website'] = $library_data->website;
        $data['copyright'] = $library_data->copyright;
        $data['notes'] = $library_data->notes;
        $data['iiif'] = $library_data->iiif;
        $data['is_free_cultural_works_license'] = $library_data->is_free_cultural_works_license;
        $data['has_post'] = $library_data->has_post;
        $data['post_url'] = $library_data->post_url;
        $data['library_name_slug'] = $library_data->library_name_slug;
        $data['is_part_of'] = $library_data->is_part_of;
        $data['is_part_of_url'] = $library_data->is_part_of_url;

        if ($request->isMethod('post')) {
            $this->validate(
                $request,
                [
                    'nation' => 'required|string|min:3|max:255',
                    'city' => 'required|string|max:255',
                    'library' => 'required|string|max:255',
                    'lat' => 'required|string|max:10',
                    'lng' => 'required|string|max:10',
                    'quantity' => 'required|string',
                    'website' => 'required|active_url|max:255',
                    'copyright' => 'required|string|max:255',
                    'notes' => 'string|max:255',
                    'iiif' => 'required|boolean',
                    'is_free_cultural_works_license' => 'required|boolean',
                    'has_post' => 'boolean',
                    'post_url' => 'active_url',
                    'library_name_slug' => 'max:255',
                    'is_part_of' => 'max:255',
                    'is_part_of_url' => 'active_url',
                ]
            );

            $library_data = $this->library->find($library_id);
            $library_data->nation = $request->input('nation');
            $library_data->city = $request->input('city');
            $library_data->library = $request->input('library');
            $library_data->lat = $request->input('lat');
            $library_data->lng = $request->input('lng');
            $library_data->quantity = $request->input('quantity');
            $library_data->website = $request->input('website');
            $library_data->copyright = $request->input('copyright');
            $library_data->notes = $request->input('notes');
            $library_data->iiif = $request->input('iiif');
            $library_data->is_free_cultural_works_license = $request->input('is_free_cultural_works_license');
            $library_data->has_post = $request->input('has_post');
            $library_data->post_url = $request->input('post_url');
            $library_data->library_name_slug = $request->input('library_name_slug');
            $library_data->is_part_of = $request->input('is_part_of');
            $library_data->is_part_of_url = $request->input('is_part_of_url');
            try {
                $library_data->save();
            } catch (Throwable $e) {

                Log::error('Unable to add institution to the databaase: ' . $e);
                //TODO check if the view has an "error" and a "success section"'
                //TODO this should redirect to the newly created insitution's page
                return redirect()->route('create_library')->with("error", "Something went wrong and the institution could not be saved. Check the logs.");
            }
        }

        return redirect('admin')->with("success", "An institution has been successfully saved.");
    }

}
