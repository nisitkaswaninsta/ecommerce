<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transactionable()
    {
        return $this->morphTo();
    }
}
