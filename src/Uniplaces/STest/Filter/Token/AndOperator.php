<?php
namespace Uniplaces\STest\Filter\Token;

class AndOperator extends Operator implements TokenConditionInterface
{

    public function match($doc = null)
    {
        foreach ($this->stackConditions as $condition) {
            if (!$condition->match($doc)) {
                return false;
            }
        }
        return true;
    }
    
    public function hash()
    {
        return md5('AND_'.parent::hash());
    }
}
