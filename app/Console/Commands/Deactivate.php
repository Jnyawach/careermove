<?php

namespace App\Console\Commands;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Deactivate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:deactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate Jobs that have met deadline';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
       $jobs=Job::where('deadline','<',Carbon::now())->get();
       foreach($jobs as $job){
           $job->update([
               'status_id'=>5,
           ]);
       }


    }
}
