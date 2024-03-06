<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Report extends Command
{
    protected $signature = 'report {startdate} {enddate}';

    protected $description = 'Generate report of all users created between two dates';

    public function handle()
    {
        //
    }
}
