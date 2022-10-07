<?php

namespace QueryTypes;

use PHPUnit\Framework\TestCase;
use Simplify\QueryBuilder\QB;

class DeleteTest extends TestCase
{
    public function testSimpleDelete()
    {
        $table = "SOME_TABLE_NAME";
        $this->assertEquals(trim(QB::deleteFrom($table)->getSql()), "DELETE FROM `$table`");

        $table = "DELETE FROM *";
        $this->assertEquals(trim(QB::deleteFrom($table)->getSql()), "DELETE FROM `$table`");
    }
}