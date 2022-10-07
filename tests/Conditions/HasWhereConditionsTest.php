<?php

namespace Conditions;

use PHPUnit\Framework\TestCase;
use Simplify\QueryBuilder\Conditions\HasWhereConditions;

class HasWhereConditionsTest extends TestCase
{
    /**
     * @return HasWhereConditions
     * @throws \ReflectionException
     */
    private function getTestClass(): object
    {
        return new class { use HasWhereConditions; };
    }

    private function invokeTestClassSqlGetter(object $obj)
    {
        $method = new \ReflectionMethod($obj, "getConditionsSql");
        $method->setAccessible(true);

        return $method->invoke($obj);
    }

    public function testSimpleCondition()
    {
        $class = $this->getTestClass();
        $class->where("field", "asd");
        $this->assertEquals($this->invokeTestClassSqlGetter($class), "WHERE `field` = 'asd'");
    }

    public function testComplexConditions()
    {
        $class = $this->getTestClass();
        $class
            ->where("field", "asd")
            ->andWhere("field2", "asd2")
            ->orWhere("field3", "asd3");

        $actualSql = "WHERE ";
        $actualSql .= "`field` = 'asd'";
        $actualSql .= " AND `field2` = 'asd2'";
        $actualSql .= " OR `field3` = 'asd3'";

        $this->assertEquals($this->invokeTestClassSqlGetter($class), $actualSql);
    }
}