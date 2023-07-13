<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;


class TimelineImport extends DefaultValueBinder implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'main' => new TimelineFirstSheetImport(),
            'case' => new TimelineSecondSheetImport(),
        ];
    }
}
