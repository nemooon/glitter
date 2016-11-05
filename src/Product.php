<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Product extends Model
{
    use SoftDeletes;

    protected $appends = [
        'taxonomies',
        'types',
        'options',
    ];

    protected $fillable = [
        'slug',
        'product_name',
        'limited_quantity',
        'cost_category',
        'status',
    ];

    protected $dates = ['deleted_at'];


    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $storeModel = Store::class;

    protected $taxonomyModel = Taxonomy::class;

    protected $mediaModel = Media::class;

    // protected $optionModel = Option::class;

    // protected $variantModel = Variant::class;

    public function store()
    {
        return $this->belongsTo($this->storeModel);
    }

    public function media()
    {
        return $this->hasMany($this->mediaModel);
    }

    public function taxonomies()
    {
        return $this->belongsToMany($this->taxonomyModel, 'product_taxonomy')->withPivot('order');
    }

    // public function options()
    // {
    //     return $this->hasMany($this->optionModel);
    // }

    // public function variants()
    // {
    //     return $this->hasMany($this->variantModel);
    // }


    /**
     * ======================
     * Query Scopes
     * ======================
     */


    /**
     * ======================
     * Mutators
     * ======================
     */

    public function getTaxonomiesAttribute()
    {
        $array = [];
        $taxonomies = $this->taxonomies()->ordered()->groupBy('taxonomy');
        foreach (Taxonomy::taxonomies() as $taxonomy) {
            foreach ($taxonomies->get($taxonomy, []) as $terms) {
                $array[$taxonomy][] = $terms;
            }
        }
        return $array;
    }

    public function getTypesAttribute()
    {
        # TODO Type's order,label
        $types = $this->options()->groupBy('type')->orderBy('id')->lists('type');
        return array_combine($types->toArray(), array_map('ucfirst', $types->toArray()));
    }

    public function getOptionsAttribute()
    {
        $options = [];
        # TODO Type's order
        $types = $this->options()->groupBy('type')->orderBy('id')->lists('type');
        foreach ($types as $type) {
            $options[$type] = $this->options()->type($type)->orderBy('order')->get();
        }
        return $options;
    }

    // public function getVariantsAttribute()
    // {
    //     $variants = [];
    //     foreach ($this->types as $type => $type_label) {
    //         $variants[$type] = $this->options()->type($type)->orderBy('order')->lists('label');
    //     }
    //     return $variants;
    // }

    public function setLimitedQuantityAttribute($value)
    {
        $value = intval($value);
        $this->attributes['limited_quantity'] = $value > 0 ? $value : null;
    }

    public function setThumbnailAttribute(UploadedFile $file)
    {
        $media = Media::upload($this, $file);
        $this->thumbnail()->associate($media);
    }

    public function getSiblingsAttribute()
    {
        if ($next = $this->orderBy($this->getKeyName(), 'desc')->where($this->getKeyName(), '<', $this->getKey())->first()) {
            $next->setAppends([]);
        }
        if ($prev = $this->orderBy($this->getKeyName(), 'asc')->where($this->getKeyName(), '>', $this->getKey())->first()) {
            $prev->setAppends([]);
        }
        return compact('next', 'prev');
    }
}
