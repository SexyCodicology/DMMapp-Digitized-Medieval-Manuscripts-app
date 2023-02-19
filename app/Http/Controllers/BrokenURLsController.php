<?php

namespace App\Http\Controllers;

use App\Jobs\CheckWebsitesInDatabaseJob;
use App\Models\BrokenLink;
use App\Models\BrokenLinksTask;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BrokenURLsController extends Controller
{

    /**
     * Check all the URLs in the database and add broken links to a table
     *
     * @return Application|Factory|View
     */

    public function index(): View|Factory|Application
    {
        //dd($BrokenLinks);
        $brokenLinks = BrokenLink::all();
        return view('admin.broken_links', compact('brokenLinks'));
    }

    public function executeJob(): RedirectResponse
    {
        CheckWebsitesInDatabaseJob::dispatch(BrokenLinksTask::class);
        return redirect()->route('admin')->with('success', 'Broken Links job initiated');

    }
}
