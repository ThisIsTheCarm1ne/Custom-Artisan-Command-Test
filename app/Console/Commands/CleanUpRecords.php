<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Post;

class CleanUpRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-up-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up records older than one week and not present in the summary table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clean up records script started at: ' . Carbon::now());

        $oneWeekAgo = Carbon::now()->subWeek();
        // change $oneWeekAgo to Carbon::now() in query to debug
        Post::where('created_at', '<', $oneWeekAgo)
            ->doesntHave('PostSummary')
            ->delete();

        $this->info('Clean up records script finished at: ' . Carbon::now());
    }
}
