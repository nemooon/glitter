<?php

namespace Nemooon\Glitter\Eloquent;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class PublishedScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder
            ->where($model->getQualifiedStatusColumn(), '=', $model->getPublishedStatus())
            ->where($model->getQualifiedPublishAtColumn(), '<=', Carbon::now());
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function extend(Builder $builder)
    {
        $builder->macro('onlyPublished', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)
                ->where($model->getQualifiedStatusColumn(), '=', $model->getPublishedStatus())
                ->where($model->getQualifiedPublishAtColumn(), '<=', Carbon::now());

            return $builder;
        });

        $builder->macro('withUnPublished', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this);

            return $builder;
        });

        $builder->macro('withFuture', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)
                ->where($model->getQualifiedStatusColumn(), '=', $model->getPublishedStatus());

            return $builder;
        });

        $builder->macro('onlyFuture', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)
                ->where($model->getQualifiedStatusColumn(), '=', $model->getPublishedStatus())
                ->where($model->getQualifiedPublishAtColumn(), '>', Carbon::now());

            return $builder;
        });
    }

}
