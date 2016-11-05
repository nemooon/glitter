<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug', 'name',
    ];

    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $memberModel = Member::class;

    protected $pageModel = Page::class;

    public function members()
    {
        return $this->belongsToMany($this->memberModel, 'store_member');
    }

    public function pages()
    {
        return $this->hasMany($this->pageModel);
    }


    /**
     * ======================
     * Mutators
     * ======================
     */

    public function getPermalinkAttribute()
    {
        return route('glitter.shop.front', ['store' => $this]);
    }
}
