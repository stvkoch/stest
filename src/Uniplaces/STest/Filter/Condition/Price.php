<?php
namespace Uniplaces\STest\Filter\Condition;

use \Uniplaces\STest\Filter\Token;

class Price extends Token\Condition implements Token\TokenConditionInterface
{

    public function match($doc = null)
    {
        $listingPrice = $doc->getPrice();
        $min = isset($this->fieldValue['min']) ? $this->fieldValue['min'] : null;
        $max = isset($this->fieldValue['max']) ? $this->fieldValue['max'] : null;

        return (($min === null || $min <= $listingPrice) && ($max === null || $max >= $listingPrice));
    }

    public function hash()
    {
        return parent::hash();
    }
}
