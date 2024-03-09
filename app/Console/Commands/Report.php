<?php

namespace App\Console\Commands;

use App\Exports\ReportExport;
use App\Jobs\GenerateReportJob;
use Illuminate\Console\Command;

class Report extends Command
{
    protected $signature = 'report {startdate} {enddate}';

    protected $description = 'Generate report of all users created between two dates';

    public function handle()
    {
        $startdate = $this->argument('startdate');
        $enddate = $this->argument('enddate');

        dispatch(new GenerateReportJob($startdate, $enddate));
        return Command::SUCCESS;
    }
}
