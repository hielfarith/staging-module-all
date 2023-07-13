<?php

namespace App\Exports;

use App\Models\ReportTimesheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class ReportTimesheetExport implements FromCollection, WithHeadings, WithMapping
class ReportTimesheetExport implements WithMultipleSheets, ShouldAutoSize
{

    use Exportable;

    protected $yearFrom;
    protected $yearTo;
    protected $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function sheets(): array
    {
        $sheets = [];
        foreach($this->collection as $data) {

            $sheets[] = new ReportTimesheetPerMonthExport($data['month'], $data['users']);
        }

        return $sheets;
    }

    // protected $collection;

    // public function __construct($collection)
    // {
    //     // dd($collection[0]['users']);
    //     $this->collection = $collection[0]['users'];
    // }

    // public function collection()
    // {
    //     return $this->collection;
    // }

    // public function headings(): array
    // {
    //     return [
    //         'Staff Name',
    //         'Total Percentage',
    //         'Staff Rates (RM)',
    //     ];
    // }

    // public function map($collection): array
    // {
    //     // dd($collection);
    //     return [

    //         $collection->staffName,
    //         $collection->percentageTotal,
    //         $collection->staffRates,

    //     ];
    // }

}
