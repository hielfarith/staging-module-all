<?php

namespace App\Imports;

use App\Models\Timeline;
use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TimelineFirstSheetImport implements ToModel, WithCalculatedFormulas, SkipsEmptyRows, WithMappedCells, WithHeadingRow, HasReferencesToOtherSheets
{
    public function mapping(): array
    {
        return [
            'start_date' => 'B2',
            'end_date' => 'C2',
        ];
    }
    
    public function model(array $row)
    {
        return new Timeline([
            'title' => $row[0],
            'start_date' => Date::excelToDateTimeObject($row[1]),
            'end_date' => Date::excelToDateTimeObject($row[2]),
            'duration' => $row[3],
            'baseline' => $row[4],
            'actual' => $row[5],
            'difference' => $row[6],
            'status' => $row[7],
        ]);
    }
}
