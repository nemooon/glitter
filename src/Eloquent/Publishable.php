<?php

namespace Nemooon\Glitter\Eloquent;

use Carbon\Carbon;

trait Publishable
{
    public static function bootPublishable()
    {
        static::addGlobalScope(new PublishedScope);
    }

    /**
     * Restore a soft-deleted model instance.
     *
     * @return bool|null
     */
    public function publish()
    {
        // If the publishing event does not return false, we will proceed with this
        // restore operation. Otherwise, we bail out so the developer will stop
        // the restore totally. We will clear the deleted timestamp and save.
        if ($this->fireModelEvent('publishing') === false) {
            return false;
        }

        $this->{$this->getPublishAtColumn()} = Carbon::now();

        $result = $this->save();

        $this->fireModelEvent('published', false);

        return $result;
    }

    /**
     * Determine if the model instance has been soft-deleted.
     *
     * @return bool
     */
    public function isPublished()
    {
        return $this->{$this->getStatusColumn()} == $this->getPublishedStatus()
            && $this->{$this->getPublishAtColumn()} >= Carbon::now();
    }

    /**
     * Register a publishing model event with the dispatcher.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function publishing($callback)
    {
        static::registerModelEvent('publishing', $callback);
    }

    /**
     * Register a published model event with the dispatcher.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function published($callback)
    {
        static::registerModelEvent('published', $callback);
    }

    public function getStatusColumn()
    {
        return defined('static::STATUS') ? static::STATUS : 'status';
    }

    public function getPublishAtColumn()
    {
        return defined('static::PUBLISH_AT') ? static::PUBLISH_AT : 'publish_at';
    }

    public function getQualifiedStatusColumn()
    {
        return $this->getTable().'.'.$this->getStatusColumn();
    }

    public function getQualifiedPublishAtColumn()
    {
        return $this->getTable().'.'.$this->getPublishAtColumn();
    }

    public function getPublishedStatus()
    {
        return defined('static::PUBLISHED_STATUS') ? static::PUBLISHED_STATUS : 'publish';
    }

}
