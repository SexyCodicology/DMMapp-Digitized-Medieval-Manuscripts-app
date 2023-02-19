<?php

namespace App\Jobs;

use App\Models\BrokenLink;
use App\Models\Library;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class CheckWebsitesInDatabaseJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, IsMonitored;

    protected $BrokenLinksTask;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public int $tries = 1;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public int $maxExceptions = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public int $timeout = 3000; //50 minutes = 5 seconds to timeout per link in the db

    /**
     * Indicate if the job should be marked as failed on timeout.
     *
     * @var bool
     */
    public bool $failOnTimeout = true;

    /**
     * Create a new job instance.
     *
     *
     */
    public function __construct()
    {
        //$this->BrokenLinksTask = $BrokenLinksTask;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        BrokenLink::truncate();
        //get only the id, url, and institution name from the database
        $libraries = Library::all();
        $urls = $libraries->map->only(['id', 'website', 'library']);

        foreach ($urls as $url) {
            try {
                $response = Http::get($url['website'])->failed();

                if ($response !== false) {
                    /* If the response from the URL is not within the 200's, we'll add the details into the 'broken urls' table */
                    $status_code = Http::withOptions([
                        'connect_timeout' => 3,
                        'timeout' => 3,
                    ])->get($url['website'])->status();

                    $library = $url['library'];
                    $brokenUrl = $url['website'];
                    $dmmapp_id = $url['id'];

                    BrokenLink::updateOrCreate([
                        'dmmapp_id' => $dmmapp_id
                    ],
                        ['status_code' => $status_code, 'url' => $brokenUrl, 'library' => $library, 'dmmapp_id' => $dmmapp_id]
                    );
                }
            } catch (Exception $e) {

                $library = $url['library'];
                $brokenUrl = $url['website'];
                $dmmapp_id = $url['id'];

                BrokenLink::updateOrCreate([
                    'dmmapp_id' => $dmmapp_id
                ],
                    ['status_code' => $e->getMessage(), 'url' => $brokenUrl, 'library' => $library, 'dmmapp_id' => $dmmapp_id]
                );

            }
        }
        Log::info('Broken URLs check complete.');
        //TODO send email notification to sexycodicology@gmail.com once the job is complete.
        //Think about what you would like to see in the email (broken links list? number of broken links detected? etc.)
    }
}
