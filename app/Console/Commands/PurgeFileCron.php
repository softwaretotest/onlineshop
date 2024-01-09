<?php

namespace App\Console\Commands;

use App\Models\Product;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class PurgeFileCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'purgefile:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Purge File Cron is Running ... !");

        try {
            $filesInFolder = File::files(public_path('product'));
            foreach ($filesInFolder as $path) {
                $file = pathinfo($path);

                $imagename = Product::firstWhere('image', $file['basename']);
                if (is_null($imagename)) {
                    File::delete($file['dirname'] . '/' . $file['basename']);
                    Log::info($file['dirname'] . '/' . $file['basename']);
                }
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        $this->info('purgefile:cron Command Run Successfully !');
        return Command::SUCCESS;
    }
}
