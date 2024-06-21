<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCase extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roadmap() {
        return $this->belongsTo(RoadMap::class, 'roadmap_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function government() {
        return $this->belongsTo(Government::class, 'government_id');
    }

    public function processes($case_id) {
        return $this->belongsTo(BusinessProcess::class, 'businesscase_id');
    }

}
