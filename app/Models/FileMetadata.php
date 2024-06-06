<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileMetadata extends Model
{
    protected $table = 'files_metadata';

    protected $fillable = [
        'id', 'chunkSize', 'filename', 'length', 'md5', 'metadata', 'uploadDate'
    ];

    protected $casts = [
        'metadata' => 'json',
        'uploadDate' => 'datetime'
    ];

    public function fileChunks()
    {
        return $this->hasMany(FileChunk::class, 'id', 'files_id');
    }
}
