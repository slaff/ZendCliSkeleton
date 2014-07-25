#!/usr/bin/env php
<?php
/**
 * Create zs-client.phar
 *
 * @link      http://github.com/zendframework/ZFTool for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

if ($argc < 2) {
    die("Usage:\n\t".$argv[0]." phar-file-name\n");
}

$srcRoot   = dirname(__DIR__);
$filename  = $argv[1].'.phar';
$pharPath = __DIR__ . "/$filename";

if (file_exists($pharPath)) {
    unlink($pharPath);
}

$phar = new \Phar($pharPath, 0, $filename);
$phar->startBuffering();

// remove the first line in the index file
$phar->addFromString("bin/cli.php", substr(php_strip_whitespace("$srcRoot/bin/cli.php"), 19));
$phar->addFile("$srcRoot/init_autoloader.php", 'init_autoloader.php');

addDir($phar, "$srcRoot/vendor", $srcRoot);
if (is_dir("$srcRoot/config")) {
    addDir($phar, "$srcRoot/config", $srcRoot);
}
addDir($phar, "$srcRoot/src", $srcRoot);

$stub = <<<EOF
#!/usr/bin/env php
<?php
/*
 * This application is based on ZendCliSkeleton
 *
 * @link      https://github.com/slaff/ZendCliSkeleton
 * @copyright Copyright (c) 2015 Slavey Karadzhov
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
define('PHAR', true);
Phar::mapPhar('$filename');
require 'phar://$filename/bin/cli.php';
__HALT_COMPILER();

EOF;

$phar->setStub($stub);
$phar->stopBuffering();

if (file_exists($pharPath)) {
    echo "Phar created successfully in $pharPath\n";
    chmod($pharPath, 0755);
} else {
    echo "Error during the compile of the Phar file $pharPath\n";
    exit(2);
}

/**
 * Add a directory in phar removing whitespaces from PHP source code
 *
 * @param Phar $phar
 * @param string $sDir
 */
function addDir($phar, $sDir, $baseDir = null)
{
    $oDir = new RecursiveIteratorIterator (
        new RecursiveDirectoryIterator ($sDir),
        RecursiveIteratorIterator::SELF_FIRST
    );

    $allowedExtensions = array (
        'php','phtml','inc'
    );

    foreach ($oDir as $sFile) {
        if (in_array(pathinfo($sFile, PATHINFO_EXTENSION),$allowedExtensions)) {
            addFile($phar, $sFile, $baseDir);
        }
    }
}

/**
 * Add a file in phar removing whitespaces from the file
 *
 * @param Phar $phar
 * @param string $sFile
 */
function addFile($phar, $sFile, $baseDir = null)
{
    if (null !== $baseDir) {
        $phar->addFromString(substr($sFile, strlen($baseDir) + 1), php_strip_whitespace($sFile));
    } else {
        $phar->addFromString($sFile, php_strip_whitespace($sFile));
    }
}
