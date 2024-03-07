<?php

namespace App\Console\Commands;

use App\Models\Library;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Symfony\Component\Console\Command\Command as CommandAlias;


class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a sitemap for this application.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        Log::notice('Generating sitemap');
        try {
            $libraries = Library::all();
            $this->info('Generating sitemap');
            $sitemap = Sitemap::create()
                ->add(Url::create('/')->setLastModificationDate(Carbon::yesterday())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.9))
                ->add(Url::create('/map')->setLastModificationDate(Carbon::yesterday())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.7))
                ->add(Url::create('/data')->setLastModificationDate(Carbon::yesterday())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.8));

            foreach ($libraries as $library) {
                $sitemap->add(Url::create("/$library->library_name_slug")->setLastModificationDate(Carbon::yesterday())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.9));
            }

            $sitemap->writeToFile(public_path('sitemap.xml'));
            $this->info('Sitemap successfully generated');
            Log::notice('Sitemap successfully generated');
            return CommandAlias::SUCCESS;
        } catch (Exception $e) {
            $this->info('Generating sitemap failed');
            Log::error('Generating sitemap failed: ' . $e);
            return CommandAlias::FAILURE;
        }

    }
}
