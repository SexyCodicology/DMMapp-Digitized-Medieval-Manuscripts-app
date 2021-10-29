<?php

namespace App\Http\Controllers;

use App\Models\Library as Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
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

    /**
     * @throws ValidationException
     */
    public function newLibrary(Request $request, Library $library)
    {
        //TODO missing data entries (iiif, is_part_of, license, etc.)'

        $data = [];

        $data['nation'] = $request->input('nation');
        $data['city'] = $request->input('city');
        $data['library'] = $request->input('library');
        $data['lat'] = $request->input('lat');
        $data['lng'] = $request->input('lng');
        $data['quantity'] = $request->input('quantity');
        $data['website'] = $request->input('website');
        $data['copyright'] = $request->input('copyright');
        $data['notes'] = $request->input('notes');

        if ($request->isMethod('post')) {
            //dd($data);
            $this->validate(
                $request,
                [
                    'nation' => 'required|min:3|max:255',
                    'city' => 'required|max:255',
                    'library' => 'required|max:255',
                    'lat' => 'required|max:10',
                    'lng' => 'required|max:10',
                    'quantity' => 'required',
                    'website' => 'required|max:255',
                    'copyright' => 'required|max:255',
                    'notes' => 'max:255',

                ]
            );
            try {
                $library->insert($data);
            } catch (Throwable $e) {
                Log::error('Unable to add a new library to the database:' . $e);
                //TODO check if the view has an "error" and a "success section"
                return redirect()->route('new_library')->with("error", "Something went wrong and the library could not be saved. Check the logs.");
            }
        }

        return redirect('new_library')->with("success", "A new institution has been successfully saved.");

    }

    //TOOD Try-catch

    public function destroy($id)
    {
        $library = Library::findOrFail($id);

        try {
            $library->delete();
            return redirect('admin')->with("success", "An institution has been successfully deleted.");

        } catch (Throwable $e) {

            Log::error('Unable delete library from the database:' . $e);
            //TODO check if the view has an "error" and a "success section"
            return redirect()->route('new_library')->with("error", "Something went wrong and the library could not be deleted. Check the logs.");
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

    /*public function show($library_name_slug)

    {
    //return __METHOD__ . ':' . $library_id;
    $data = [];
    $data['library_name_slug'] = $library_name_slug;
    $data['modify'] = 1;
    $library_data = Library::find($library_name_slug);
    dd($library_data);
    $data['nation'] = $library_data->nation;
    $data['city'] = $library_data->city;
    $data['library'] = $library_data->library;
    $data['lat'] = $library_data->lat;
    $data['lng'] = $library_data->lng;
    $data['quantity'] = $library_data->quantity;
    $data['website'] = $library_data->website;
    $data['copyright'] = $library_data->copyright;
    $data['notes'] = $library_data->notes;

    return view('admin/show', $data);
    }8?

    /**
     * @throws ValidationException
     */

    public function modify(Request $request, $library_id)

    //TODO try catch
    //TODO missing data entries (iiif, is_part_of, license, etc.)

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

        if ($request->isMethod('post')) {
            $this->validate(
                $request,
                [
                    'nation' => 'required|min:3|max:255',
                    'city' => 'required|max:255',
                    'library' => 'required|max:255',
                    'lat' => 'required|max:10',
                    'lng' => 'required|max:10',
                    'quantity' => 'required',
                    'website' => 'required|max:255',
                    'copyright' => 'required|max:255',
                    'notes' => 'max:255',
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
            try {
                $library_data->save();
            } catch (Throwable $e) {

                Log::error('Unable to add institution to the databaase: ' . $e);
                //TODO check if the view has an "error" and a "success section"'
                //TODO this should redirect to the newly created insitution's page
                return redirect()->route('new_library')->with("error", "Something went wrong and the institution could not be saved. Check the logs.");
            }
        }
        return redirect('admin')->with("success", "An institution has been successfully saved.");
    }

}
