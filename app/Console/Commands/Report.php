<?php

namespace App\Console\Commands;

use App\Exports\ReportExport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Command
{
    protected $signature = 'report {startdate} {enddate}';

    protected $description = 'Generate report of all users created between two dates';

    public function handle()
    {
        $startdate = $this->argument('startdate');
        $enddate = $this->argument('enddate');

        Excel::store(new ReportExport($startdate, $enddate), 'report.xlsx');
        return Command::SUCCESS;
    }
}
