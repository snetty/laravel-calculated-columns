################################################################################
 Laravel Calculated Columns
################################################################################

An simple way to add calculated columns to your eloquent models

================================================================================
 Usage
================================================================================

1. ``composer require snetty/laravel-simple-breadcrumbs``
2. add the trait ``Snetty\LaravelCalculatedColumns\CalculatedColumns;`` to your models
3. declare your calculated columns in the form ``protected $calculated_columns = [
        'new_column_name' => '(SELECT "SOME SUB QUERY")'
    ];``
4. You can use ``:user_id`` in your subqueries and it will be parsed in automatically.  If no user is present, the *whole subquery will return false*
4. you can now treat the column in eloquent as if it were a physical column