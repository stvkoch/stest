<?php
namespace Uniplaces\STest\Filter\Condition;

use \Uniplaces\STest\Filter\Token;

class Address extends Token\Condition implements Token\TokenConditionInterface
{

    public function match($doc = null)
    {
        $listingAddress = strtolower(trim($doc->getLocalization()->getAddress()));
        $address = strtolower(trim($this->fieldValue));

        return (levenshtein($listingAddress, $address) < 5);
    }

    public function hash()
    {
        return parent::hash();
    }
}
