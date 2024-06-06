<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainCollection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getObjectNotApprove($domain_id) {
        return DomainObjectCollection::where('approved', '0')->where('domain_id', $domain_id)->count();
    }
}
