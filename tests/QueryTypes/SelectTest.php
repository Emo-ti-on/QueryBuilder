<?php

namespace QueryTypes;

use PHPUnit\Framework\TestCase;
use Simplify\QueryBuilder\QB;

class SelectTest extends TestCase
{
    public function testSimpleSelect()
    {
        $table = "SOME_TABLE_NAME";
        $this->assertEquals(trim(QB::selectFrom($table)->getSql()), "SELECT * FROM `$table`");

        $table = "SELECT * FROM";
        $this->assertEquals(trim(QB::selectFrom($table)->getSql()), "SELECT * FROM `$table`");
    }
}