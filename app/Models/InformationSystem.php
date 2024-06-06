<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationSystem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function government() {
        return $this->belongsTo(Government::class, 'goverment_id');
    }

    public function typeis() {
        return $this->belongsTo(ISType::class, 'type_is');
    }
      public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    }
}
