<?php

$version = '1.0.0-dev';
if(file_exists(__DIR__.'/../composer.json')) {
	@$composer = json_decode(file_get_contents(__DIR__.'/../composer.json'), true);
	if(isset($composer['version'])) {
		$version = $composer['version'];
	}
}
define('VERSION', $version);

return array(
	'name' => 'Zend CLI Skeleton ',
	'version' => VERSION,
	'routes' => array(
			/*
			 * The commented block defines the "example" command.
			 * You can use it to learn how to create your own commands.
			 * In order to enable it you should uncomment the block below.
			 */ 
			 
			
			 array(
					'name' => 'example',
			 		// You should specify a valid PHP callback for the "handler" value
					'handler' => new Cli\Example(), 
					'route' => '--options= [--params=] [--flag]',
					'description' => 'This command is created purely for learning purposes. Make sure to remove it',
					'short_description' => 'Short introduction in creating new commands',
			 		'options_descriptions' => array(
			 				'--options' => 'Mandatory, comma separated list of options',
			 				'--params' => '(Optional) list of parameter names and values described as HTTP query string',
			 				'--flag'   => 'Optional flag with default value',
			 		),
			 		// Defaults is used to define default values for optional parameters
			 		'defaults' => array(
			 			'params' => array('k'=>'v'),
			 		),
			 		// Filters are useful for transforming the incoming data to the format that you want.
			 		'filters' => array(
			 			// The filter below translates string "x,y,z" to array("x","y","z")
			 			'options'=>'ZF\Console\Filter\Explode', 
			 			// The filter below translates string "x=one&y=two" to array("x"=>"one", "y" => "two")
			 			'params' =>'ZF\Console\Filter\QueryString'
			 		)
			 ),
			
	),
);