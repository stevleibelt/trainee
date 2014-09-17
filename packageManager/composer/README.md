# Composer Trainee Story in Section Package Manager

Learn how to use the [package manager](http://en.wikipedia.org/wiki/Package_management_system) [composer](https://getcomposer.org/) for PHP.

# Tasks

## Use Composer to fetch Dependencies

* create an empty directory called "zf_demo_environment"
* change into that directory
* clone the [zf_demo_environment](https://github.com/bazzline/zf_demo_environment) in this directory
* install composer in this directory
* install needed packages
* execute "php public/index.php console index", if no error is displayed, you have finished this part :-)
* you can remove the directory "zf_demo_environment"

## Create you own Project

* create an empty directory
* create a composer.json file
* add the dependency to the current stable version of [phpunit](https://phpunit.de/)
* install composer in this directory
* install this dependency
* add the dependency to the current development version of [phpunit](https://phpunit.de/)
* think about a way how to check that the phpunit is installed
* play around with composer
    * maybe try to install [Hoa\Console](https://github.com/hoaproject/Console)
        * create a simple console command or application
   * beautify your composer.json to get familiar with the options

## Answer Yourself the Following Questions

* what is a package manager?
* what is a dependency?
* what is a composer.json file?
* what is a composer.lock file?
* what is the difference between "install" and "update"
* how can i install "dev" versions of a dependency?
* can i update only a single dependency?
    * if so, how?
* can you list other package managers (other languages included)?
* what does "minimum-stability"
* where can i find other dependencies?
    * is this the only way?
* what is autoloading?
    * does composer help me with autoloading?
    * how to use it in a project?
    * what is psr-4 autoloading?
        * what is psr?
    * can i configure composer autoloading that way to support non psr autoloading?
        * if so, what kind of options do i have?
* what is semantic versioning?
* can i add special dependencies when i am in development mode?
* should i limit the version number?
    * what is a major version?
    * what is a minor version?
    * what is a patched version?
* any remarks how composer is handling dependencies?
