<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformRoleCollection extends Model
{
    use HasFactory;

    protected $table = 'informsystem_approle_collection';

    public function funcComp()
    {
        return $this->belongsTo(InformFuncComptCollection::class, 'version_id', 'version_id');
    }

    public function userCirc()
    {
        return $this->belongsTo(InformUserCircuitCollection::class, 'usercircuit', 'id');
    }

}
