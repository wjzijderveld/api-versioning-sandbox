API Versioning Sandbox
========================

This sandbox shows a basic implementations of API versioning. The main part is done in the Router, where we determine the
requested API version from the Accept header.

Disclaimer: this sandbox is aimed to demonstrate how it could work, it's not intented to show the best possible way. A lot
could be improved and done better.

Installation
------------

    $ composer install


Running examples
----------------

The easiest way to try this out is to use PHP's built-in webserver and curl.

    $ php -S localhost:8000 -t web

__API: Version 1__

    $ curl -XGET localhost:8000/app.php/jobs -H "Accept: application/vnd.wjzijderveld.api+json;version=1"
    {{"title":"Parking boy","salary":"15cts an hour"},{"title":"Lift boy","salary":"10cts an hour"}}

__API: Version 2__

In this version, we sorted the jobs alphabetically ascending.

    $ curl -XGET localhost:8000/app.php/jobs -H "Accept: application/vnd.wjzijderveld.api+json;version=2"
    {{"title":"Lift boy","salary":"10cts an hour"},{"title":"Parking boy","salary":"15cts an hour"}}

Changing the version, or removing the Accept header results in a 404

    $ curl -I -XGET localhost:8000/app.php/jobs -H "Accept: application/vnd.wjzijderveld.api+json;version=3"
    < HTTP/1.1 404 Not Found
    < ...
