<?php

namespace Simplify\QueryBuilder;

use Simplify\QueryBuilder\QueryTypes\Delete;
use Simplify\QueryBuilder\QueryTypes\Insert;
use Simplify\QueryBuilder\QueryTypes\Select;
use Simplify\QueryBuilder\QueryTypes\Update;

class QB
{
    public static function insertInto(string $table): Insert
    {
        return new Insert($table);
    }

    public static function selectFrom(string $table): Select
    {
        return new Select($table);
    }

    public static function update(string $table): Update
    {
        return new Update($table);
    }

    public static function deleteFrom(string $table): Delete
    {
        return new Delete($table);
    }

    public static function prepareField($val): string
    {
        return "`$val`";
    }

    public static function prepareValue($val)
    {
        return is_string($val) ? "'$val'" : $val;
    }
}