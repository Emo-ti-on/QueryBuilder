<?php

namespace Simplify\QueryBuilder\QueryTypes;

use Simplify\QueryBuilder\Conditions\HasWhereConditions;
use Simplify\QueryBuilder\QueryType;

class Delete extends QueryType
{
    use HasWhereConditions;

    public function getSql(): string
    {
        $table = $this->table;
        return "DELETE FROM `$table` " . $this->getConditionsSql();
    }
}