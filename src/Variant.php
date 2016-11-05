<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    public $timestamps = false;

    protected $appends = [
        'options',
        'format_selling_price',
        'format_reference_price',
    ];

    protected $fillable = [
        'variant_name',
        'sku',
        'selling_price',
        'reference_price',
        'stock_quantity',
        'limited_quantity',
        'status',
        'order',
    ];

    protected $casts = [
        'selling_price' => 'float',
        'reference_price' => 'float',
    ];

    protected $touches = ['product'];

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $productModel = Product::class;

    protected $optionModel = Option::class;

    public function product()
    {
        return $this->belongsTo($this->productModel);
    }

    public function options()
    {
        return $this->belongsToMany($this->optionModel, 'option_variant');
    }


    /**
     * ======================
     * Query Scopes
     * ======================
     */

    public function scopeOption($query, $options)
    {
        foreach ($options as $option) {
            $query->whereHas('options', function ($q) use ($option) {
                $q->type($option->type)->where('label', $option->label);
            });
        }
        return $query;
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->get();
    }


    /**
     * ======================
     * Mutators
     * ======================
     */

    public function getFormatSellingPriceAttribute()
    {
        if ($this->attributes['selling_price']) {
            return '¥ '. number_format($this->attributes['selling_price']);
        }
        return null;
    }

    public function getFormatReferencePriceAttribute()
    {
        if ($this->attributes['reference_price']) {
            return '¥ '. number_format($this->attributes['reference_price']);
        }
        return null;
    }

    public function getOptionsAttribute()
    {
        $options = [];
        $types = Option::groupBy('type')->lists('type');
        foreach ($types as $type) {
            $options[$type] = $this->options()->type($type)->first();
        }
        return $options;
    }
    public function getEditionAttribute()
    {
        if ($option = $this->options()->type('edition')->first())
            return $option->label;
        return '';
    }
    public function getSizeAttribute()
    {
        if ($option = $this->options()->type('size')->first())
            return $option->label;
        return '';
    }
    public function getColorAttribute()
    {
        if ($option = $this->options()->type('color')->first())
            return $option->label;
        return '';
    }

}
