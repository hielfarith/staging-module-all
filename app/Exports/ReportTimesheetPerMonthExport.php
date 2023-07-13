<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportTimesheetPerMonthExport implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $month;
    protected $collection;

    public function __construct($month, $collection)
    {
        $this->month = $month;
        $this->collection = $collection;
    }

    public function collection()
    {
        return $this->collection;
    }

    public function title(): string //Ni nama sheets
    {
        return 'Timesheet: '.$this->month;
    }

    public function headings(): array
    {
        return [
            'Staff Name',
            'Total Percentage',
            'Staff Rates',
        ];
    }

    public function map($collection): array
    {
        // dd($collection);
        return [

            $collection->staffName,
            $collection->percentageTotal,
            $collection->staffRates,

        ];
    }
}
