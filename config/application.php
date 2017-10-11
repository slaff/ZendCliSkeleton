<?php

$version = '1.0.0-dev';

if (file_exists(__DIR__ . '/../composer.json')) {

    @$composer = json_decode(file_get_contents(__DIR__ . '/../composer.json'), true);
    if (isset($composer['version'])) {
        $version = $composer['version'];
    }
}

define('VERSION', $version);

return array(
    'name' => 'Zend CLI Skeleton',
    'version' => VERSION,
);