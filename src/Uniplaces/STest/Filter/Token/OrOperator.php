<?php
namespace Uniplaces\STest\Filter\Token;

class OrOperator extends Operator implements TokenConditionInterface
{
    
    public function match($doc = null)
    {
        foreach ($this->stackConditions as $condition) {
            if ($condition->match($doc)) {
                return true;
            }

        }
        return false;
    }
    

    public function hash()
    {
        return md5('OR_'.parent::hash());
    }
}
