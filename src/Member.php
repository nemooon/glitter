<?php

namespace Nemooon\Glitter;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $storeModel = Store::class;

    protected $roleModel = Role::class;

    public function stores()
    {
        return $this->belongsToMany($this->storeModel, 'store_member');
    }

    public function role()
    {
        return $this->belongsToMany($this->roleModel, 'member_role');
    }

}
