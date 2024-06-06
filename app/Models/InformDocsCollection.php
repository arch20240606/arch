<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformDocsCollection extends Model
{
    use HasFactory;

    protected $table = 'docs_collection';

    public function captionName()
    {
        return $this->belongsTo(InformDocTypeCollection::class, 'portalTypeDoc', 'id');
    }
    public function getFullCaption()
    {
        return $this->captionName->caption . '-' . $this->filename;
    }

}
