<?php

namespace App\Imports;

use App\Models\Reports\ReportDatabaseDBUsage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ReportDatabaseDBUsageImport implements ToModel, WithStartRow, SkipsEmptyRows
{
    private $report_application_id;

    public function __construct(int $id)
    {
        $this->report_application_id = $id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReportDatabaseDBUsage([
            'tableName'     => $row[0],
            'tableRow'    => $row[1],
            'tableSize'    => $row[2],
            'report_database_id' => $this->report_application_id,
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * Skip Empty Rows
     */

    public function rules(): array
    {
        return [
            '0' => [
                'required',
                'string',
            ],
        ];
    }
}
