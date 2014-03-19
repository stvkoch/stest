Simple test install
=====

```
git clone git@github.com:uniplaces/stest.git
cd stest
curl -sS https://getcomposer.org/installer | php
php composer.phar install
```

Run the tests:
```
./vendor/bin/phpunit
```
