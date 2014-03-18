<?php

namespace Uniplaces\STest\Listing;

use Uniplaces\STest\Localization\Localization;
use Uniplaces\STest\Requirement\Requirements;

class Listing
{
    /**
     * @var Localization
     */
    protected $localization;

    /**
     * @var Requirements
     */
    protected $requirements;

    /**
     * @var float
     */
    protected $price;

    /**
     * @param Localization $localization
     * @param Requirements $requirements
     * @param float        $price
     */
    public function __construct(Localization $localization, Requirements $requirements, $price)
    {
        $this->localization = $localization;
        $this->requirements = $requirements;
        $this->price = $price;
    }

    /**
     * @return Localization
     */
    public function getLocalization()
    {
        return $this->localization;
    }

    /**
     * @return Requirements
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
