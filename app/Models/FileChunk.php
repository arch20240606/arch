<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileChunk extends Model
{
    protected $table = 'file_chunks';

    protected $fillable = [
        'id', 'data', 'files_id', 'n'
    ];

    public function fileMetadata()
    {
        return $this->belongsTo(FileMetadata::class, 'files_id', 'id');
    }
}
