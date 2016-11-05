<?php

namespace Nemooon\Glitter;

use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Media extends Model
{
    public $timestamps = false;

    protected $appends = [
        'url',
    ];

    protected $fillable = [
        'filename',
        'path',
        'mime',
        'filesize',
        'width',
        'height',
    ];

    protected $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return static
     */
    public static function upload(Product $product, UploadedFile $file = null)
    {
        if (!$file->isValid()) return false;

        $model = new static([
            'filename'  => $file->getClientOriginalName(),
            'mime'      => $file->getClientMimeType(),
            'filesize'  => $file->getClientSize(),
        ]);
        $model->product()->associate($product);
        $model->save();

        $extension = $file->getClientOriginalExtension();
        $path = 'media/'.md5(microtime().$model->getKey()).'.'.$extension;

        $this->storage->disk('s3')->put($path, file_get_contents($file->getRealPath()));

        $model->fill([
            'path'      => $path,
            'upload_at' => $model->freshTimestamp(),
        ]);
        $model->save();

        return $model;
    }

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $pageModel = Page::class;

    protected $productModel = Product::class;

    public function pages()
    {
        return $this->belongsToMany($this->pageModel, 'page_media');
    }

    public function products()
    {
        return $this->belongsToMany($this->productModel, 'product_media');
    }


    /**
     * ======================
     * Mutators
     * ======================
     */

    public function getUrlAttribute()
    {
        $bucket = config('filesystems.disks.s3.bucket');
        return "http://{$bucket}.s3.amazonaws.com/{$this->path}";
    }

}
