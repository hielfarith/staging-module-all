<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLedger extends Model
{
    use HasFactory;

    public $month;
    public $effective_date;
    public $trans_type;
    public $reference;
    public $debit;
    public $credit;
    public $balance;

    public function __construct($month = null, $effective_date = null, $trans_type = null, $reference = null, $debit = null, $credit = null, $balance = null)
    {
        $this->month = $month;
        $this->effective_date = $effective_date;
        $this->trans_type = $trans_type;
        $this->reference = $reference;
        $this->debit = $debit;
        $this->credit = $credit;
        $this->balance = $balance;
    }
}
