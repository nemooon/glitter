<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nemooon\Glitter\Eloquent\Publishable;

class Page extends Model
{
    use Publishable, SoftDeletes;

    protected $dates = ['publish_at', 'deleted_at'];

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $storeModel = Store::class;

    protected $memberModel = Member::class;

    public function store()
    {
        return $this->belongsTo($this->storeModel);
    }

    public function author()
    {
        return $this->belongsTo($this->memberModel, 'author_id');
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
     * Query Scopes
     * ======================
     */

    public function scopePath($query, $path)
    {
        $slugs = collect(explode('/', $path));

        $pages = self::whereIn($this->getTable().'.slug', $slugs)->get();

        $target_slug = $slugs->pop();

        $page = $pages->where('slug', $target_slug)->filter(function ($page) use ($slugs, $pages) {
            $parent_id = $page->parent_id;
            $parent_slugs = collect();

            while (!is_null($parent_id)) {
                if ($pages->whereIn('id', $parent_id)->isEmpty()) {
                    return false;
                }
                $parent = $pages->where($this->getKeyName(), $parent_id)->first();
                $parent_slugs->prepend($parent->slug);
                $parent_id = $parent->parent_id;
            }

            return $parent_slugs->toJson() == $slugs->toJson();
        })->sortBy('order')->first();

        if (!$page) {
            throw (new ModelNotFoundException)->setModel(get_class($this->model));
        }

        return $query->where($this->getKeyName(), $page->getKey());
    }


    /**
     * ======================
     * Mutators
     * ======================
     */

    public function getPermalinkAttribute()
    {
        return route('glitter.shop.page', ['store' => $this->store, 'path' => $this->path]);
    }

    public function getPathAttribute()
    {
        $slugs = collect([$this->slug]);

        $page = $this;
        while (!is_null($page->parent_id)) {
            $page = $page->parent;
            $slugs->prepend($page->slug);
        }

        return join('/', $slugs->toArray());
    }

    public function getParentsAttribute()
    {
        $parents = $this->newCollection();
        $page = $this;
        while (!is_null($page->parent_id)) {
            $page = $page->parent;
            $parents->prepend($page);
        }
        return $parents;
    }

    public function getSiblingsAttribute()
    {
        $query = $this->parent_id ? self::where('parent_id', '=', $this->parent_id) : self::whereNull('parent_id');
        return $query->where($this->getKeyName(), '!=', $this->getKey())->get();
    }

}
