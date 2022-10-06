<?php

namespace Simplify\QueryBuilder\QueryTypes;

use Simplify\QueryBuilder\Conditions\HasFields;
use Simplify\QueryBuilder\Conditions\HasWhereConditions;
use Simplify\QueryBuilder\QB;
use Simplify\QueryBuilder\QueryType;

class Update extends QueryType
{
    use HasWhereConditions, HasFields;

    public function getSql(): string
    {
        $values = implode(', ', array_map(function ($key, $val) {
            return QB::prepareField($key) . ' = ' . QB::prepareValue($val);
        }, array_keys($this->fields), array_values($this->fields)));

        $table = $this->table;
        return "UPDATE `$table` SET $values " . $this->getConditionsSql();
    }
}