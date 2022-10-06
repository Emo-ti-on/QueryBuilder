<?php

namespace Simplify\QueryBuilder\QueryTypes;

use Simplify\QueryBuilder\Conditions\HasFields;
use Simplify\QueryBuilder\Conditions\HasWhereConditions;
use Simplify\QueryBuilder\QB;
use Simplify\QueryBuilder\QueryType;

class Select extends QueryType
{
    use HasWhereConditions, HasFields;

    public function getSql(): string
    {
        $fields = empty($this->fields)
            ? "*"
            : implode(', ', array_map([QB::class, "prepareField"], $this->fields));

        $table = $this->table;
        return "SELECT $fields FROM `$table` " . $this->getConditionsSql();
    }
}