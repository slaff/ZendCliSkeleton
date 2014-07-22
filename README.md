Zend Cli Skeleton
=================================

This Zend Framework 2 application is intended to be used as a bolierplate for your
own command line applications.

Requirements
------------

* PHP >= 5.3.3
* zfcampus/zf-console >=1.0.2

Installation
------------
Run composer install to get all dependant packages. 
If you do not know what composer is then:
1. Download the latest composer.phar file from https://getcomposer.org/composer.phar and save it 
to the same directory as the README.md file directory.
2. Run the following command:
php composer.phar install

Usage
-----

This application is console-aware. It has predefined the following console commands:

- `help`, which will list all available commands
- `version`, which will show you the current version information 
- `autocomplete`, which provides autocompletion support for bash, zsh, and any shell that understands autocompletion 			  rules in a similar fashion. 

Typical usage will look like this from your application:

```bash
% php bin/cli.php help
```

Develop
-------
Make sure to read the official documentation of zfcampus/zf-console 
(https://github.com/zfcampus/zf-console/blob/master/README.md) and check the following
files for an example of creating a new command in your application.

config/applicaiton.php --> to find an example of defining a new command
src/Example.php --> to find an example of a command handler
 