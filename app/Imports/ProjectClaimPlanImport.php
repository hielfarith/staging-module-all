<?php

namespace App\Imports;

use App\Models\ProjectClaimPlan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProjectClaimPlanImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    public function __construct($project)
    {
        $this->project = $project;
    }

    public function model(array $row)
    {
        return new ProjectClaimPlan([
            'project_id' => $this->project->id,
            'claim_plan_desc' => trim($row[1]),
            'claim_plan_date' => Date::excelToDateTimeObject($row[2]),
            'claim_plan_detail' => trim($row[3]),
            'claim_plan_monthly' => $row[4],
            'claim_plan_other' => $row[5],
            'claim_plan_total' => $row[6],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
