<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    public $timestamps = false;

    protected $appends = [];

    protected $fillable = [
        'taxonomy',
        'slug',
        'name',
        'description',
        'parent_id',
    ];


    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $storeModel = Store::class;

    protected $pageModel = Page::class;

    protected $productModel = Product::class;

    public function store()
    {
        return $this->belongsTo($this->storeModel);
    }

    public function pages()
    {
        return $this->belongsToMany($this->pageModel, 'page_taxonomy');
    }

    public function products()
    {
        return $this->belongsToMany($this->productModel, 'product_taxonomy');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    /**
     * ======================
     * Static
     * ======================
     */

    public static function taxonomies()
    {
        return static::groupBy('taxonomy')->get()->lists('taxonomy');
    }

    public static function hierarchical()
    {
        $taxonomies = static::groupBy('taxonomy')->get()->lists('taxonomy');
        $hierarchical = [];
        foreach ($taxonomies as $taxonomy) {
            $hierarchical[$taxonomy] = static::with('children')->tax($taxonomy)->parentId()->lists('name');
        }
        return $hierarchical;
    }

    public static function terms(Store $store)
    {
        $taxonomies = collect([]);
        foreach (static::where('store_id', $store->getKey())->groupBy('taxonomy')->lists('taxonomy') as $taxonomy) {
            $taxonomies->put($taxonomy, static::tax($taxonomy)->get());
        }
        return $taxonomies;
    }


    /**
     * ======================
     * Query Scopes
     * ======================
     */

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->get();
    }

    public function scopeNestable($query)
    {
        $terms = $query->with('children')->parentId()->get();
        function transform($terms) {
            return $terms->map(function($item, $key){
                $children = transform($item->children);
                unset($item->children);
                return collect(compact('item','children'));
            });
        }
        return transform($terms);
        // return $taxonomies->groupBy('taxonomy');
        // $taxonomies = $query->groupBy('taxonomy')->lists('taxonomy');
        // $hierarchical = [];
        // foreach ($taxonomies as $taxonomy) {
        //     $hierarchical[$taxonomy] = static::with('children')->where('store_id', $store->getKey())->tax($taxonomy)->parentId()->get();
        // }
        // return $hierarchical;
    }


    /**
     * ======================
     * Mutators
     * ======================
     */

}
