<?php

namespace Simplify\QueryBuilder\Conditions;

use Simplify\QueryBuilder\QB;
use Simplify\QueryBuilder\QueryTypes\Insert;

trait HasFields
{
    protected array $fields = [];

    public function fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    protected function getPreparedFieldsKeys(): string
    {
        return $this->prepareKeys(array_keys($this->fields));
    }

    protected function getPreparedFieldsValues(): string
    {
        return $this->prepareValues(array_values($this->fields));
    }

    protected function prepareKeys(array $keys): string
    {
        return implode(', ', array_map([QB::class, "prepareField"], $keys));
    }

    protected function prepareValues(array $values): string
    {
        return implode(', ', array_map([QB::class, "prepareValue"], $values));
    }
}