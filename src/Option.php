<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    protected $appends = [
        'options',
        'format_selling_price',
        'format_reference_price',
    ];

    protected $fillable = [
        'type',
        'label',
        'order',
    ];

    protected $hidden = ['pivot'];

    // protected $touches = ['product'];

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $productModel = Product::class;

    protected $variantModel = Option::class;

    public function product()
    {
        return $this->belongsTo($this->productModel);
    }

    public function variants()
    {
        return $this->belongsToMany($this->variantModel, 'option_variant');
    }


    /**
     * ======================
     * Query Scopes
     * ======================
     */

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->get();
    }
}
