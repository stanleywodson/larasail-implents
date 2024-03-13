<?php

namespace App\Console\Commands;

use App\Jobs\MlaExample;
use Illuminate\Console\Command;

class Example extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for($i =0; $i < 10; $i++){
            dispatch(new MlaExample());
        }
    }
}
