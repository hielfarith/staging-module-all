<?php

namespace App\Imports;

use App\Models\ReportSijilDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReportSijilsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReportSijilDetails([
            'Firstname'     => $row[0],
            'Secondname'    => $row[1],
        ]);
    }
}
