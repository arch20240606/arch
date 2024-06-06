<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformApprelationCollection extends Model
{
    use HasFactory;

    protected $table = 'informsystem_apprelation_collection';

    public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    }

}
