<?php
namespace Uniplaces\STest\Filter\Token;

interface OperatorInterface
{
    public function pushCondition($condition = null);
    public function hash();
}
