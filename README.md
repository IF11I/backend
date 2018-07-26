# IF 11i - Backendserver
This repository is for the Backendserver 


## Creating The Database

To create a database, please use the following MySQL statement:

``` SQL
CREATE DATABASE db_name CHARACTER SET utf8 COLLATE utf8_unicode_ci;
```

After that, run this command to create the tables:

```
$ vendor/bin/doctrine orm:schema-tool:create
```


## Importing Test Data

To import test data into your database, use this command:

```
composer run-script generateDummy
```
