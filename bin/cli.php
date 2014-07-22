#!/usr/bin/env php
<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) Slavey Karadzhov
 */

use Zend\Console\Console;
use ZF\Console\Application;

include_once __DIR__.'/../init_autoloader.php';

$config = include __DIR__ . '/../config/application.php';

$application = new Application(
    $config['name'],
    $config['version'],
    $config['routes'],
    Console::getInstance()
);
$exit = $application->run();
exit($exit);