<?php

namespace ZendCliSkeleton;

use Zend\Console\Adapter\AdapterInterface as Console;
use ZF\Console\Route;

/**
 * This class is an example of a CLI command handler
 * Class ExampleHandler
 * @package ZendCliSkeleton
 */
class ExampleHandler
{
    /**
     * In this example the __invoke magic method is used to simplify the
     * configuration of the route. All that must be declared in the route
     * configuration is the class name
     * @param Route $route
     * @param Console $console
     */
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
        if ($route->getMatchedParam('flag')) {
            $console->write("Flag was set.\n");
        }
    }

    public function callback(Route $route, Console $console)
    {
        $console->writeLine("The callback method was used as a handler.");
    }
}
