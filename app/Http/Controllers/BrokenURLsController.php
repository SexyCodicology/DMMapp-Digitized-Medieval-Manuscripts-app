<?php

namespace App\Http\Controllers;

use App\Models\BrokenLink;
use App\DataTables\BrokenLinksDataTable;
use App\Models\Library;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BrokenURLsController extends Controller
{

    /**
     * Check all the URLs in the database and add broken links to a table
     *
     * @param Request $request
     * @return Application|Factory|View
     */

    public function __invoke(BrokenLinksDataTable $dataTable)
    {
        //dd($BrokenLinks);
        return $dataTable->render('admin.broken_links');

        set_time_limit(0);
        BrokenLink::truncate();
        $libraries = Library::all();
        $urls = $libraries->map->only(['id', 'website', 'library']);

        foreach ($urls as $url) {
            try{
            $response = Http::get($url['website'])->failed();

            if ($response !== false) {
                error_log('logging broken link');
                /* If the response from the URL is not within the 200's, we'll add the details into the 'broken urls' table */
                $status_code = Http::withOptions([
                    'connect_timeout' => 5,
                    'timeout' => 5
                ])->get($url['website'])->status();
                $dmmapp_id = $url['id'];
                $url = $url['website'];
                BrokenLink::updateOrCreate([
                    'dmmapp_id' => $dmmapp_id
                ],
                        ['status_code' => $status_code, 'url' => $url]
                );
            }
            else {
                error_log('working URL detected');
            }
            } catch (Exception $e)
            {
                $dmmapp_id = $url['id'];
                $url = $url['website'];
                BrokenLink::updateOrCreate([
                    'dmmapp_id' => $dmmapp_id
                ],
                    ['status_code' => $e->getMessage(), 'url' => $url]
                );

            }

            error_log('moving on!');
        }
    }
}
