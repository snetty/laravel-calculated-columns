<?php

namespace Snetty\LaravelCalculatedColumns;

use Snetty\LaravelCalculatedColumns\Scopes\CalculatedColumnsScope;

trait CalculatedColumns
{

    public static function bootCalculatedColumns()
    {
        static::addGlobalScope(new CalculatedColumnsScope);
    }

}