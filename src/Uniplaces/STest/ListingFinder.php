<?php

namespace Uniplaces\STest;

use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Requirement\StayTime;
use Uniplaces\STest\Requirement\TenantTypes;
use DateTime;

class ListingFinder implements ListingFinderInterface
{
    /**
     * @var string
     */
    protected $searchType;

    /**
     * @param string $searchType simple|advanced
     */
    public function __construct($searchType = 'simple')
    {
        $this->searchType = $searchType;
    }

    /**
     * @param Listing[] $listings
     * @param array     $search
     *
     * @return Listing[]
     */
    public function reduce(array $listings, array $search)
    {
        $schema = \Uniplaces\STest\Filter\Config\SchemaFactory::create($this->searchType);
        $filterParse = new \Uniplaces\STest\Filter\Parse($schema);
        $conditions = $filterParse->parse($search);
        $matchListings = array();

        foreach ($listings as $listing) {

            if ($conditions->match($listing)) {
                $matchListings[] = $listing;
            }
        }

        return $matchListings;
    }
}
