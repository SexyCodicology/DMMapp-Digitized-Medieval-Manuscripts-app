<?php

namespace App\Jobs;

use App\Models\BrokenLinksTask;
use App\Models\BrokenLink;
use App\Models\Library;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckWebsitesInDatabaseJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $BrokenLinksTask;

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
        Log::info('Emptying Broken Links database...');
        BrokenLink::truncate();
        $libraries = Library::all();
        $urls = $libraries->map->only(['id', 'website', 'library']);
        Log::info('Initiating URLs checks...');

        foreach ($urls as $url) {
            try{
                $response = Http::get($url['website'])->failed();

                if ($response !== false) {
                    Log::info('Broken link detected.');
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
        }
        Log::info('Broken URLs check complete.');
        //TODO send email notification to sexycodicology@gmail.com once the job is complete. Think about what you would like to see in the email (broken links list? number of broken links detected? etc.)
    }
}
