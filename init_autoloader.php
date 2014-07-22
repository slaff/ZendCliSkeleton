<?php
switch (true) {
	case (file_exists(__DIR__ . '/../vendor/autoload.php')):
		// Installed standalone
		require __DIR__ . '/../vendor/autoload.php';
		break;
	case (file_exists(__DIR__ . '/../../../autoload.php')):
		// Installed as a Composer dependency
		require __DIR__ . '/../../../autoload.php';
		break;
	case (file_exists('vendor/autoload.php')):
		// As a Composer dependency, relative to CWD
		require 'vendor/autoload.php';
		break;
	default:
		throw new RuntimeException('Unable to locate Composer autoloader; please run "composer install".');
}