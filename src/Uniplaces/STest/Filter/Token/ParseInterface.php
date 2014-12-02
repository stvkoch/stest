<?php
namespace Uniplaces\STest\Filter\Token;

/**
 * Why this is different of ParseTokenInterface? Because this return another type of object
 */
interface ParseInterface
{
    /**
     * @return \Filter\Token\Operator
     */
    public function parse($search = array());
}
