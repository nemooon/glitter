<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $hidden = [
        'pivot',
    ];

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $roleModel = Role::class;

    public function roles()
    {
        return $this->belongsToMany($this->roleModel, 'role_policy');
    }
}
