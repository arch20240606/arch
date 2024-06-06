<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessObject extends Model
{
    use HasFactory;
    protected $table = 'informsystem_businessobject_collection';
    public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    }
}
