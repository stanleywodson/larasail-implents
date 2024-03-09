<?php

namespace App\Jobs;

use App\Events\ReportGeneratedEvent;
use App\Exports\ReportExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;


class GenerateReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $startdate,
        public string $enddate,
    ){}

    public function handle(): void
    {
        $filename = "usersreport" . now()->timestamp . ".xlsx";
        Excel::store(new ReportExport($this->startdate, $this->enddate), $filename);

        event(new ReportGeneratedEvent($filename));
    }
}
