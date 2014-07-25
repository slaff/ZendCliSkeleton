Zend Cli Skeleton
=================================

This Zend Framework 2 application is intended to be used as a boilerplate for your
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
$ php bin/cli.php help
```

Develop
-------
Make sure to read the official documentation of zfcampus/zf-console 
(https://github.com/zfcampus/zf-console/blob/master/README.md) and check the following
files for an example of creating a new command in your application.

- config/application.php --> to find an example of defining a new command
- src/Example.php --> to find an example of a command handler

You application as single file
--------------------------------
If you want to distribute your command line application and make it easier for 
your users then you can give them one stand-alone file to run with
everything that is needed packed into it. In PHP this can be achieved by creating 
a phar file (http://php.net/manual/en/intro.phar.php).

The ZendCliSkeleton comes with a built-in support for creating phar phar files.
In the build/ directory you will find phar.php file that creates for you such file.
Typical usage is:

```bash
$ php build/phar zf-tool
```
The command above will create a new file build/zf-tool.phar that you can distribute.
If you want the name of your app to be something else, then replace zf-tool in the command
above with the name of your choice.

There is also second command, targeting bash shell, that can help you automate clean
build of your phar file. If you run it like this:

```bash
$ bash build/build-phar.sh
```

The bash script will try to create you phar file by fetching the source code if the 
application from its git repository, then download dependant libraries described 
in the composer.json file and finally pack everything into one build/cli.phar file.
