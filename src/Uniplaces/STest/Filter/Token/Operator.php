<?php
namespace Uniplaces\STest\Filter\Token;

class Operator implements OperatorInterface, TokenConditionInterface
{
    protected $stackConditions = array();

    public function pushCondition($condition = null)
    {
        $this->stackConditions[] = $condition;
    }

    public function match($doc = null)
    {
        throw new \Exception('This Operator not implement actions');
    }

    public function hash()
    {
        $hash = '';
        foreach ($this->stackConditions as $position => $condition) {
            $hash .= $position . $condition->hash();
        }
        return md5($hash);
    }
}
