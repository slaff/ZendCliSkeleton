<?php
namespace Cli;

use Zend\Console\Adapter\AdapterInterface as Console;
use ZF\Console\Route;

class Example {
	public function __invoke(Route $route, Console $console)
    {	
    	// options should be indexed array
    	$options = $route->getMatchedParam('options');
    	$console->write('The first option is '.$options[0]."\n");
    	
    	// params should be assoc. array
    	$params = $route->getMatchedParam('params', array());
    	foreach ($params as $key=>$value) {
    		$console->write(sprintf("Param %s has value %s\n", $key, $value));
    	}
    	
    	// and flag should be boolean
    	if($route->getMatchedParam('flag')) {
    		$console->write("Flag was set.\n");
    	}
	}
}