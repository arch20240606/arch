<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformTechnologyCollection extends Model
{
    use HasFactory;

    protected $table = 'informsystem_technology_collection';

    public function funcComp()
    {
        return $this->belongsTo(InformFuncComptCollection::class, 'version_id', 'version_id');
    }

}
