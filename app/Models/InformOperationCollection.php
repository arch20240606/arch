<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformOperationCollection extends Model
{
    use HasFactory;

    protected $table = 'informsystem_operation_collection';

    public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'ownerId', 'id');
    }
    public function funcComp()
    {
        return $this->belongsTo(InformFuncComptCollection::class, 'version_id', 'version_id');
    }

}
