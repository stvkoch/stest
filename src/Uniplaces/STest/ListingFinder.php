<?php

namespace Uniplaces\STest;

use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Requirement\StayTime;
use Uniplaces\STest\Requirement\TenantTypes;
use DateTime;

class ListingFinder
{
    /**
     * @param Listing[] $listings
     * @param array     $search The search is done by the user
     *                          array(
     *                              'city' => 'name of city' // exact match,
     *                              // this is not an exact match, is using Levenshtein distance
     *                              // after cleaning both strings
     *                              ['address' => '...'],
     *                              ['price' => array(
     *                                  ['min' => val],
     *                                  ['max' => val],
     *                              )],
     *                              // both dates must be filled or none
     *                              ['start_date' => DateTime,
     *                              'end_date' => DateTime,]
     *                              'occupation' => 'undergraduate|postgraduate|...'
     *                              )
     *                          )
     *
     * @return Listing[]
     */
    public function reduce(array $listings, array $search)
    {
        $matchListings = array();

        foreach ($listings as $listing) {
            if ($listing->getLocalization()->getCity() != $search['city']) {
                continue;
            }

            if (isset($search['address'])) {
                $listingAddress = strtolower(trim($listing->getLocalization()->getAddress()));
                $address = strtolower(trim($search['address']));

                if (levenshtein($listingAddress, $address) > 5) {
                    continue;
                }
            }

            if (isset($search['price'])) {
                $listingPrice = $listing->getPrice();
                $min = isset($search['price']['min']) ? $search['price']['min'] : null;
                $max = isset($search['price']['max']) ? $search['price']['max'] : null;

                if (($min !== null && $min > $listingPrice) || ($max !== null && $max < $listingPrice)) {
                    continue;
                }
            }

            $stayTime = $listing->getRequirements()->getStayTime();
            if (isset($search['start_date']) && $stayTime instanceof StayTime) {
                /** @var DateTime $startDate */
                $startDate = $search['start_date'];
                /** @var DateTime $endDate */
                $endDate = $search['end_date'];

                $interval = $endDate->diff($startDate);
                $days = (int)$interval->format('%a');

                if ($days < $stayTime->getMin() || $days > $stayTime->getMax()) {
                    continue;
                }
            }

            $tenantTypes = $listing->getRequirements()->getTenantTypes();
            if ($tenantTypes instanceof TenantTypes && !in_array($search['occupation'], $tenantTypes->toArray())) {
                continue;
            }

            $matchListings[] = $listing;
        }

        return $matchListings;
    }
}
