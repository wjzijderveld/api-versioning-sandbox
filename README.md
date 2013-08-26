API Versioning Sandbox
========================

This sandbox shows 2 basic implementations of API versioning. The main part is done in the Router, where we determine the
requested API version from the Accept header.

Disclaimer: this sandbox is aimed to demonstrate how it could work, it's not intented to show the best possible way. A lot
could be improved and done better. For example: I disabled route caching to make it easier to see what happens. A custom
dumper would be needed to enable caching again.

Installation
------------

    $ composer install


Running examples
----------------

There are 2 web controllers, one for each implementation. Because we use the Accept header, the easiest way to test this
is to use PHP's buildin webserver and curl.

    $ php -S localhost:8000 -t web

__API: Version 1__

    $ curl -XGET localhost:8000/option2.php/jobs -H "Accept: application/vnd.wjzijderveld.api+json;version=1"
    > {"1":{"title":"Lift boy","salary":"10cts an hour"},"2":{"title":"Parking boy","salary":"15cts an hour"}}

__API: Version 2__

In this version, we sorted the jobs alphabetically descending.

    $ curl -XGET localhost:8000/option2.php/jobs -H "Accept: application/vnd.wjzijderveld.api+json;version=2"
    > {"2":{"title":"Parking boy","salary":"15cts an hour"},"1":{"title":"Lift boy","salary":"10cts an hour"}}

(Change option2 to option3 to test the other implementation)

Changing the version, or removing the Accept header results in a 404

    $ curl -I -XGET localhost:8000/option2.php/jobs -H "Accept: application/vnd.wjzijderveld.api+json;version=3"
    > HTTP/1.1 404 Not Found
    > ...