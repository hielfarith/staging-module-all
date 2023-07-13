<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TimelineSecondSheetImport implements ToCollection, WithHeadingRow, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

    }
    
    public function startRow(): int
    {
        return 4;
    }

    public function headingRow(): int
    {
        return 3;
    }
}
