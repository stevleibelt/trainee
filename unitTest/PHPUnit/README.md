# PHPUnit Trainee Story in Section Unit Test

Learn how to write unit tests with the php [de facto](https://en.wikipedia.org/wiki/De_facto) standard implementation [PHPUnit](https://phpunit.de/).

@todo
* create empty unit test file
* create validator that needs to get covered by a unit test
* create a unit test that needs a real implementation to test against

## Tasks

* read [getting started](https://phpunit.de/getting-started.html)
* install phpunit
* execute phpunit (php vendor/bin/phpunit)
* read [documentation](https://phpunit.de/documentation.html)
* implement tests for LoggerTest
* cover "StringFilter" with a test case
* implement or extend a test using @dataProvider
* implement or extend a test using @depends
* implement or extend a test case using [fixtures](https://phpunit.de/manual/current/en/fixtures.html)
* [organize](https://phpunit.de/manual/current/en/organizing-tests.html) your tests
* generate code coverage report
* watch the [videos](https://phpunit.de/presentations.html)

## Answer Yourself the Following Questions

* why is it good to use phpunit in vendor?
* what is the phpunit.xml.dist good for?
* why does it has the suffix ".dist"?
* for what is the "bootstrap.php" good for?
* can you make phpunit more verbose?
* how to test exception throwing?
    * can you validate the exception message also (if so, how)?
* whats the difference between "assertSame" and "assertEquals"?
* when to mark a test as incomplete?
* when to mark a test as skipped?
* when to mark a test as risky?
* did you find any useful annotations?
* is it easy to implement databased driven tests?
    * what do you have to keep in mind?
* what is unit testing good for?
* can you extend phpunit easily?
    * if you, could you find an extension you can implement?
