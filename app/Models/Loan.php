<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Asset;

class Loan extends Model
{
    public function asset()
{
    return $this->belongsTo(Asset::class);
}
}
