<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertiseConclutionUo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'conclusion_uo';
    // public $timestamps = false;

    // public function it_project() {
    //     return $this->belongsTo(It_Project::class, 'it_project_id');
    // }

    // public function users() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function getISS($id) {
    //     $iss = InformationSystem::where('id', $id)->first();
    //     return $iss;
    // }


}
