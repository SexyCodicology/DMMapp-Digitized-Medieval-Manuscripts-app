<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class URLsListController extends Controller
{
    /**
     * This controller is meant to generate a page containing all the URLs used by the DMMapp.
     * A crawler will then crawl the URLs, and inform us if the URLs need updating or have disappeared.
     * @param Request $request
     * @return Application|Factory|View
     */

    public function __invoke(Request $request)
    {
        $urls = DB::table('libraries')->pluck('website');

        return view('admin.URLsList', ['urls' => $urls]);
    }
}
