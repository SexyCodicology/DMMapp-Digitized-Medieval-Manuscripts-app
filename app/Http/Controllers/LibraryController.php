<?php

namespace App\Http\Controllers;

use App\Models\Library as Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LibraryController extends Controller
{
    //
    /**
     * @var Library
     */
    private $library;

    public function __construct(Library $library )
    {
        $this->library = $library;
    }

    public function index()
    {
        $data = [];

        $data['libraries'] = $this->library->paginate(10);

        return view('public/data', $data);
    }

    public function dmmmap()
    {
        $data = [];

        $data['libraries'] = $this->library->all();

        return view('public/map', $data);
    }

    public function search( Request $request)
    {
        $search = $request->get ('search');
        $libraries = DB::table('libraries')->where('library', 'like', '%'.$search.'%')->paginate(10);
        return view('public/data', ['libraries' => $libraries ]);

    }

    public function searchadmin( Request $request)
    {
        $search = $request->get ('search');
        $libraries = DB::table('libraries')->where('library', 'like', '%'.$search.'%')->paginate(10);
        return view('admin/admin', ['libraries' => $libraries ]);

    }

    public function admin()
    {
        $data = [];

        $data['libraries'] = $this->library->paginate(10);

        return view('admin/admin', $data);
    }

    /**
     * @throws ValidationException
     */
    public function newLibrary(Request $request, Library $library )
    {
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

        if( $request->isMethod('post') )
        {
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

            $library->insert($data);
//TODO return success message
            return redirect('/admin');
        }
        $data['modify'] = 0;
        //TODO return success message
        return view('library/form', $data);
    }

    public function destroy($id)
        {
            $library = Library::find($id);
            $library->delete();
            //TODO return success message

            return redirect('/admin');
        }

    public function show($library_id)
    {
        //return __METHOD__ . ':' . $library_id;
        $data = []; $data['library_id'] = $library_id;
        $data['modify'] = 1;
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


        return view('admin/show', $data);
    }

    /**
     * @throws ValidationException
     */

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

        if( $request->isMethod('post') )
        {
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

                $library_data->save();
                //TODO return success or fail message


            return redirect('/admin');
        }
        $data['modify'] = 1;
                        //TODO return success or fail message

        return view('admin/modify', $data);
    }

}
