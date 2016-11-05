<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $with = [
        'policies',
    ];

    protected $hidden = [
        'pivot',
    ];

    protected $fillable = [
        'store_id', 'name', 'description',
    ];

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $memberModel = Member::class;

    protected $policyModel = Policy::class;

    public function members()
    {
        return $this->belongsToMany($this->memberModel, 'member_role');
    }

    public function policies()
    {
        return $this->belongsToMany($this->policyModel, 'role_policy');
    }
}
