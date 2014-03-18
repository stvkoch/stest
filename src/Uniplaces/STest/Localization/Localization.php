<?php

namespace Uniplaces\STest\Localization;

/**
 * Localization
 */
class Localization
{
    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var int
     */
    protected $number;

    /**
     * @param string $city
     * @param string $address
     * @param int $number
     */
    public function __construct($city, $address, $number)
    {
        $this->city = $city;
        $this->address = $address;
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }
}
