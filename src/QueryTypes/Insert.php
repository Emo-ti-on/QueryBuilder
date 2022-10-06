<?php

namespace Simplify\QueryBuilder\QueryTypes;

use Simplify\QueryBuilder\Conditions\HasFields;
use Simplify\QueryBuilder\Conditions\HasWhereConditions;
use Simplify\QueryBuilder\QB;
use Simplify\QueryBuilder\QueryType;

class Insert extends QueryType
{
    use HasWhereConditions, HasFields;

    public function __construct(string $table)
    {
        parent::__construct($table);
    }

    public function getSql(): string
    {
        $keys = $this->getPreparedFieldsKeys();
        $values = $this->getPreparedFieldsValues();

        $table = $this->table;
        return "INSERT INTO `$table` ($keys) VALUES ($values) " . $this->getConditionsSql();
    }
}