<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Expertise extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'expertise';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($expertise) {
            $expertise->expertise_id = mt_rand(100000, 999999); // Генерация случайного expertise_id
        });
    }

    public function it_project() {
        return $this->belongsTo(It_Project::class, 'it_project_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getISS($id) {
        $iss = InformationSystem::where('id', $id)->first();
        return $iss;
    }

    public function gosorg()
    {
        return $this->belongsTo(Government::class, 'goverment_id', 'id');
    }
}
