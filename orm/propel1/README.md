# Propel1 Trainee Story in Section ORM

Learn how to use and administrate [propel1](http://propelorm.org/Propel/documentation/).

It does not matter if you are solving the following tasks as command line script or as website.
The [index.php](https://github.com/stevleibelt/trainee/blob/master/orm/propel1/public/index.php) file should be your starting point. This file provides autoloading out of the box.
Composer autoloader is defined that way, that each file in [Trainee](https://github.com/stevleibelt/trainee/blob/master/orm/propel1/source/Trainee) will be loaded automatically.

If you make changes to the "schema.xml", use "script/build-propel.sh" to update your objects.

## Tasks

* setup a database on your local database management system (adapt [configuration/propel/build.properties](https://github.com/stevleibelt/trainee/blob/master/orm/propel1/configuration/propel/build.properties) if needed, use files in [data/sql](https://github.com/stevleibelt/trainee/blob/master/orm/propel1/data/sql])
* read the documentation
* implement way to access your database via propel
* implement output of content interpret or album
* implement output of album with fitting interpret name
* implement insertion of a new interpret or a new album
* implement deletion of interpret or album
* implement update of a new interpret or a new album
* add a table called "tracklist" that includes usefull informations about a track on a album
* write a query that returns just "id" and "name" from the interpret table

## Answer Yourself the Following Questions

* what is pdo?
* what is an orm?
* what is instance pooling
    * when it is good to use
    * when it is bad to use
* how are the php objects generated?
* what is the difference between "MyTable", "MyTablePeer" and "MyTableQuery"?
* what kind of logic/methods should be added inside "MyTable", "MyTablePeer" or "MyTableQuery"?
    * take a look into your implementation and create methods in the above mention classes
* what benefits and drawbacks can you list by using an orm?
* how can you write a plain sql statement with propel?
    * when could this be usefull?
* did you find any optimization potential to the schema.xml?
