<?php

namespace App\Http\Controllers;

use App\Jobs\CheckWebsitesInDatabaseJob;
use App\Models\BrokenLink;
use App\Models\BrokenLinksTask;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BrokenURLsController extends Controller
{

    /**
     * Check all the URLs in the database and add broken links to a table
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse
     * @throws Exception
     */

    public function index(Request $request)
    {
        //dd($BrokenLinks);
        if ($request->ajax()) {
            $data = BrokenLink::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return  '<a class="btn btn-primary" href="/admin/edit/' . $row['id'] . '" role="button">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make();

        }

        return view('admin.broken_links');
    }

    public function executeJob(): RedirectResponse
    {
        CheckWebsitesInDatabaseJob::dispatch(BrokenLinksTask::class);
        return redirect()->route('admin')->with('success', 'Broken Links job initiated');

    }
}
