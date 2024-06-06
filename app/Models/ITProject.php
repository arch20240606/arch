<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ITProject extends Model
{
    use HasFactory;
    public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    }
    

}
