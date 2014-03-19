Simple test
=====

Simple practical test.

Try to improve as much as possible the code.

The finder class (the rest is just entities an object value):
https://github.com/uniplaces/stest/blob/master/src/Uniplaces/STest/ListingFinder.php

Don't change tests, they all must run:
https://github.com/uniplaces/stest/blob/master/tests/Uniplaces/STest/Tests/FindListingsTest.php#L171

After refactor is expected:
* ListingFinder and ListingFinderFactory should be easy to read in under 20 seconds and understand what it do;
* The size of ListingFinder should be minimum (is just a class to "query");
* Add new "rules" should be easy and shouldn't require to touch ListingFinder code directly;
* Hard coded values on ListingFinder shouldn't be hard coded and should be easy to configure;
* Should be easy to add new type of search eg: 'extra-advanced' without touching the ListingFinder code
