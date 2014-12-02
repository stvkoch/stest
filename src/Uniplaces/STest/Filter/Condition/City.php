<?php
namespace Uniplaces\STest\Filter\Condition;

use \Uniplaces\STest\Filter\Token;

class City extends Token\Condition implements Token\TokenConditionInterface
// , \Token\ParseTokenInterface
{
    
    // public function parse($search = array())
    // {
    //     if (isset($search['city'])) {
    //         $this->fieldValue['city'] = $search['city'];
    //         unset($search['city']);
    //     }
    //     return $search;
    // }

    public function match($doc = null)
    {
        return ($doc->getLocalization()->getCity() === $this->fieldValue);
    }

    public function hash()
    {
        return parent::hash();
    }
}
