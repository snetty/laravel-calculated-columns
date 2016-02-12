<?php

namespace Snetty\LaravelCalculatedColumns\Scopes;

use Illuminate\Database\Eloquent\ScopeInterface AS Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CalculatedColumnsScope implements Scope
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
        if(isset($model['calculated_columns'])){
            $builder->addSelect('*');
            foreach($model['calculated_columns'] as $column => $query){
                if(str_contains($query, ':user_id')){
                    $query = auth() && auth()->user() ? str_replace(':user_id', auth()->user()->id, $query) : 'false';
                }
                $builder->selectSub($query, $column);
            }
        }

        return $builder;
    }

    public function remove(Builder $builder, Model $model){
        if(isset($model['calculated_columns'])){
            foreach($model['calculated_columns'] as $column => $query){
                unset($builder->columns[$column]);
            }
        }
        return $builder;
    }
}