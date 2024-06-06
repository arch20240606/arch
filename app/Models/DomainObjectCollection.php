<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainObjectCollection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function domains() {
        return $this->belongsTo(DomainCollection::class, 'domain_id');
    }

    public static function domainObjects($domain_id, $type) {
        return DomainObjectCollection::where('domain_id', $domain_id)->where('type', $type)->get();
    }


    public static function domainObjectsGo($domain_id, $type) {
        return DomainObjectCollection::
            where('domain_id', $domain_id)->
            where('type', $type)->
            where('send_to_approve', '1')->
            where('attributes', 'LIKE', '%'.Auth::user()->government->name_ru.'%')->
            get();
    }

    public static function domainObjectsMCRIAP($domain_id, $type) {
        return DomainObjectCollection::
            where('domain_id', $domain_id)->
            where('type', $type)->
            where('send_to_approve', '1')->
            where('approved', '1')->
            get();
    }

}
