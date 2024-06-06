<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationSystemCollection extends Model
{
    use HasFactory;

    public function getGO($id) {
        return GosorganCollection::where('_id', $id)->first();
    }

    public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    }


}
