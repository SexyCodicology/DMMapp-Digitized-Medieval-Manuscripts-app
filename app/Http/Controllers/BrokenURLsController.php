<?php

namespace App\Http\Controllers;

use App\DataTables\BrokenLinksDataTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BrokenURLsController extends Controller
{

    /**
     * Check all the URLs in the database and add broken links to a table
     *
     * @param BrokenLinksDataTable $dataTable
     * @return Application|Factory|View
     */

    public function __invoke(BrokenLinksDataTable $dataTable)
    {
        //dd($BrokenLinks);
        return $dataTable->render('admin.broken_links');

    }
}
