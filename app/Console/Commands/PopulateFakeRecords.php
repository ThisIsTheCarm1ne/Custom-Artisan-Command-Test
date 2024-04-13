<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\PostSummary;
use Illuminate\Support\Facades\DB;

class PopulateFakeRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-fake-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add fake records to \'Post\' table to check the \'CleanUpRecords\' command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = \Faker\Factory::create();

        // Insert random data into the Post table
        for ($i = 0; $i < 50; $i++) {
            echo "PopulateFakeRecords \n";
            $post = Post::create([
                'content' => $faker->text,
            ]);

            // If ID is even - create a relationship to the PostSummary table
            if ($post->id % 2 == 0) {
                $post->PostSummary()->create([
                    'metrics_summary' => $faker->text,
                ]);
            }
        }

        $this->info('Data inserted successfully.');
    }
}
