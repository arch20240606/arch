<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'informsystem_hardwareitem_collection';
    public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    }
}
