<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformDocTypeCollection extends Model
{
    use HasFactory;

    protected $table = 'documenttypesdict_collection';

    // public function gosorg()
    // {
    //     return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    // }

}
