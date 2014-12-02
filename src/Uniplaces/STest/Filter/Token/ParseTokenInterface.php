<?php
namespace Uniplaces\STest\Filter\Token;

interface ParseTokenInterface
{
    /**
     * It makes yours conditions most smartly and responsibles
     *
     * @return array
     */
    public function parse($search = array());
}