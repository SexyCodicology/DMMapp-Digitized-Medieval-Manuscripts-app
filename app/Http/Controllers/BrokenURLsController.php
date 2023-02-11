<?php

namespace App\Http\Controllers;

use App\DataTables\BrokenLinksDataTable;
use App\Jobs\CheckWebsitesInDatabaseJob;
use App\Models\BrokenLinksTask;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class BrokenURLsController extends Controller
{

    /**
     * Check all the URLs in the database and add broken links to a table
     *
     * @param BrokenLinksDataTable $dataTable
     * @return Application|Factory|View
     */

    public function index(BrokenLinksDataTable $dataTable)
    {
        //dd($BrokenLinks);
        return $dataTable->render('admin.broken_links');

    }

    public function executeJob(BrokenLinksDataTable $dataTable)
    {
        CheckWebsitesInDatabaseJob::dispatch(BrokenLinksTask::class);
        return redirect()->route('admin')->with('success', 'Broken Links job initiated');

    }
}
