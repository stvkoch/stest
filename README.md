Simple test
=====

Simple practical test.

Try to improve as much as possible the code.

The main method (the rest is just entities an object value):
https://github.com/uniplaces/stest/blob/master/src/Uniplaces/STest/ListingFinder.php

Don't change tests, the only exception is the construction of objects if you desire (but without breaking the tests, and without change the value of properties):
https://github.com/uniplaces/stest/blob/master/tests/Uniplaces/STest/Tests/FindListingsTest.php#L171

After refactor is expected:
* ListingFinder should be easy to read in under 20 seconds and understand what it do;
* The size of ListingFinder should be minimum (is just a class to "query");
* Add new "rules" should be easy and shouldn't require to touch ListingFinder code direclty;
* Hard coded values on ListingFinder shouldn't be hard coded and should be easy to configure;
