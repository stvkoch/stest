<?php

namespace Uniplaces\STest;

/**
 * ListingFinderFactory
 */
abstract class ListingFinderFactory
{
    /**
     * @return ListingFinderInterface
     */
    public static function createSimple()
    {
        return new ListingFinder('simple');
    }

    /**
     * @return ListingFinderInterface
     */
    public static function createAdvanced()
    {
        return new ListingFinder('advanced');
    }
}
