<?php

namespace Nemooon\Glitter\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Nemooon\Glitter\Domain\Models\Domainable;
use Nemooon\Glitter\Domain\Models\Entities\{Item, ImageFile};
use Nemooon\Glitter\Domain\Models\Values\{ItemId, FileId};
use Nemooon\Glitter\{Store, Media, Taxonomy};

class EloquentItem extends Model implements Domainable
{
    use SoftDeletes;

    protected $table = 'products';

    // protected $appends = [
    //     'taxonomies',
    //     'types',
    //     'options',
    // ];

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

    // public function store()
    // {
    //     return $this->belongsTo(Store::class);
    // }

    public function media()
    {
        return $this->belongsToMany(EloquentFile::class, 'product_media', 'product_id', 'media_id');
    }

    // public function taxonomies()
    // {
    //     return $this->belongsToMany(Taxonomy::class, 'product_taxonomy')->withPivot('order');
    // }

    public function toDomain(): Item
    {
        $item = new Item(new ItemId($this->getKey()));
        $item->setName($this->name);
        if ($file = $this->media->first()) {
            $item->setThumbnail($file->toDomain());
        }
        return $item;
    }
}
