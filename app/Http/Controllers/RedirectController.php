<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library as Library;


class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $library = Library::findOrFail($id);
        $slug = $library->library_name_slug;

        return redirect('/' . $slug, 301); 

    }
}
