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
    public $tries = 1;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public $maxExceptions = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 300; //5 minutes

    /**
     * Indicate if the job should be marked as failed on timeout.
     *
     * @var bool
     */
    public $failOnTimeout = true;

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
        Log::info('Checking URLs validity in the DMMapp database...');
        Log::info('Emptying Broken Links database');
        BrokenLink::truncate();
        Log::info('Broken Links database emptied');
        $libraries = Library::all();
        $urls = $libraries->map->only(['id', 'website', 'library']);
        Log::info('Initiating URLs checks');

        foreach ($urls as $url) {
            try{
                $response = Http::get($url['website'])->failed();

                if ($response !== false) {
                    Log::info('Broken link detected.');
                    error_log('logging broken link');
                    /* If the response from the URL is not within the 200's, we'll add the details into the 'broken urls' table */
                    $library = $url['library'];
                    $status_code = Http::withOptions([
                        'connect_timeout' => 5,
                        'timeout' => 5
                    ])->get($url['website'])->status();
                    $dmmapp_id = $url['id'];
                    $url = $url['website'];
                    BrokenLink::updateOrCreate([
                        'dmmapp_id' => $dmmapp_id
                    ],
                        ['status_code' => $status_code, 'url' => $url, 'library' => $library]
                    );
                }
                else {
                    error_log('working URL detected');
                }
            } catch (Exception $e)
            {
                $library = $url['library'];
                $dmmapp_id = $url['id'];
                $url = $url['website'];
                BrokenLink::updateOrCreate([
                    'dmmapp_id' => $dmmapp_id
                ],
                    ['status_code' => $e->getMessage(), 'url' => $url, 'library' => $library]
                );

            }
        }
        Log::info('Broken URLs check complete.');
        //TODO send email notification to sexycodicology@gmail.com once the job is complete.
        //Think about what you would like to see in the email (broken links list? number of broken links detected? etc.)

        //$this->release();
    }
}
