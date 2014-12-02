<?php
namespace Uniplaces\STest\Filter\Token;

interface TokenConditionInterface
{
    public function match($doc = null);
    public function hash();
}
