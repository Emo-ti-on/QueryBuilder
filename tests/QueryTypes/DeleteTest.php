<?php

namespace QueryTypes;

use PHPUnit\Framework\TestCase;
use Simplify\QueryBuilder\QB;

class DeleteTest extends TestCase
{
    public function testSimpleDelete()
    {
        $table = "user";
        $this->assertEquals(trim(QB::deleteFrom($table)->getSql()), "DELETE FROM `$table`");
    }
}