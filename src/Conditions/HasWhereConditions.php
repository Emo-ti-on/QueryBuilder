<?php

namespace Simplify\QueryBuilder\Conditions;

use Simplify\QueryBuilder\QB;

trait HasWhereConditions
{
    protected array $where = [];

    public function where(string $field, $condition, $value = null)
    {
        if ($value === null && $condition !== null) {
            return $this->where($field, '=', $condition);
        }

        $value = QB::prepareValue($value);
        $field = QB::prepareField($field);

        $this->where[] = "$field $condition $value";
        return $this;
    }

    public function andWhere(string $field, $condition, $value = null)
    {
        $this->where[] = "AND";
        return $this->where($field, $condition, $value);
    }

    public function orWhere(string $field, $condition, $value = null)
    {
        $this->where[] = "OR";
        return $this->where($field, $condition, $value);
    }

    protected function getConditionsSql(): string
    {
        if (empty($this->where)) {
            return '';
        }
        return "WHERE " . implode(' ', $this->where);
    }
}