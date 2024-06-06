<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    use HasFactory;

    public function gosorg()
    {
        return $this->belongsTo(GosorgCollection::class, 'sendingOrgId', 'id');
    }

    public function receivingOrg()
    {
        return $this->belongsTo(GosorgCollection::class, 'receivingOrgId', 'id');
    }

    public function dataReceivingSoftware()
    {
        return $this->belongsTo(InformationSystemCollection::class, 'dataReceivingSoftwareVersionGuid', 'versionGuid');
    }

    public function dataSendingSoftware()
    {
        return $this->belongsTo(InformationSystemCollection::class, 'dataSendingSoftwareVersionGuid', 'versionGuid');
    }

}
