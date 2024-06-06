<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadMap extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function government() {
        return $this->belongsTo(Government::class, 'government_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCase($id) {
        return BusinessCase::where('roadmap_id', $id)->get();
    }

    public function getFunctions($function_id) {
        return BusinessFunction::where('id', $function_id)->first();
    }
    
    public function getProcess($id, $case_id) {
        return BusinessProcess::where('businessfunction_id', $id)->where('businesscase_id', $case_id)->where('status', 1)->get();
    }
    




}
