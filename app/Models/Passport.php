<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function government() {
        return $this->belongsTo(Government::class, 'goverment_id');
    }

    public function information_system() {
        return $this->belongsTo(InformationSystem::class, 'information_systems_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getUser($id) {
        return User::where('id', $id)->first();
    }

}
