<?php

namespace App\Http\Controllers;

use App\Jobs\CheckWebsitesInDatabaseJob;
use App\Models\BrokenLink;
use App\Models\BrokenLinksTask;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class BrokenURLsController extends Controller
{
    /**
     * Check all the URLs in the database and add broken links to a table
     */
    public function index(): View|Factory|Application
    {
        //dd($BrokenLinks);
        $brokenLinks = BrokenLink::all();

        return view('admin.broken_links', compact('brokenLinks'));
    }

    public function executeJob(): RedirectResponse
    {
        try {
            Log::notice('A manual request to check for broken links has been submitted');
            CheckWebsitesInDatabaseJob::dispatch(BrokenLinksTask::class)->delay(now());
            Log::notice('The job has been dispatched. Redirecting user.');

            return redirect()->route('broken-links')->with('success', 'Broken Links job added to the queue');
        } catch (Exception $e) {
            return redirect()->route('broken-links')->with('error', 'Unable to initiate job: '.$e);
        }
    }
}
