<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProcess extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function b_functions() {
        return $this->belongsTo(BusinessFunction::class, 'businessfunction_id');
    }
}
