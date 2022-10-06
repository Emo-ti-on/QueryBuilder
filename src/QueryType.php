<?php

namespace Simplify\QueryBuilder;

abstract class QueryType
{
    protected string $sql = '';
    protected string $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    abstract public function getSql(): string;
}