<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

//use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;

    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'government_id',
        'surname',
        'name',
        'middlename',
        'email',
        'password',
        'activity',
        'verify_ecp',
        'ecp_key',
        'ip_address',
        'last_login'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function government() {
        return $this->belongsTo(Government::class, 'government_id');
    }

    public function hasRoles()
    {
    return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }

}
