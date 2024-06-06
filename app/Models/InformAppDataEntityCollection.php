<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformAppDataEntityCollection extends Model
{
    use HasFactory;

    protected $table = 'informsystem_appdataentity_collection';

    // public function gosorg()
    // {
    //     return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    // }

}
