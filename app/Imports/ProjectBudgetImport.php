<?php

namespace App\Imports;

use App\Models\ProjectBudget;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProjectBudgetImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    public function __construct($project)
    {
        $this->project = $project;
    }

    public function model(array $row)
    {
        return new ProjectBudget([
            'project_id' => $this->project->id,
            'item_name' => trim($row[1]),
            'tender_price' => $row[2],
            'contigency' => $row[3],
            'tax' => $row[4],
            'base_price' => $row[5],
            'best_case' => $row[6],
            'on_par' => $row[7],
            'worst_case' => $row[8],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
