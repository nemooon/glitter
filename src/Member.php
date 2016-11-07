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

    public function activeStore()
    {
        return $this->belongsToMany($this->storeModel, 'store_member')
            ->withPivot('last_login_at')->orderBy('last_login_at', 'desc');
    }

    public function roles()
    {
        return $this->belongsToMany($this->roleModel, 'member_role');
    }


    /**
     * ======================
     * Mutators
     * ======================
     */

    public function getActiveStoreAttribute()
    {
        return $this->activeStore()->first();
    }

    public function getSwitchableStoresAttribute()
    {
        return $this->stores->except([$this->active_store->getKey()]);
    }

    public function getActiveStoreRoleAttribute()
    {
        $store = $this->active_store;
        return $this->roles()->where('roles.store_id', $store->getKey())->first();
    }
}
