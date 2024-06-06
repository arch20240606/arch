<?php

// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = ['name', 'description']; // Поля, которые можно массово назначать

    /**
     * Получить всех пользователей, у которых есть данная роль.
     */
    // app/Models/Role.php

public function users()
{
    return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
}


    
}
