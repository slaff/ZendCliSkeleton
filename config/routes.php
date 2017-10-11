<?php
return [
    [
        'name' => 'example',
        // You should specify a valid PHP callback for the "handler" value
        'handler' => new \ZendCliSkeleton\Example(),
        'route' => '--options= [--params=] [--flag]',
        'description' => 'This command is created purely for learning purposes. Make sure to remove it',
        'short_description' => 'Short introduction in creating new commands',
        'options_descriptions' => [
            '--options' => 'Mandatory, comma separated list of options',
            '--params' => '(Optional) list of parameter names and values described as HTTP query string',
            '--flag' => 'Optional flag with default value',
        ],
        // Defaults is used to define default values for optional parameters
        'defaults' => [
            'params' => ['k' => 'v'],
        ],
        // Filters are useful for transforming the incoming data to the format that you want.
        'filters' => [
            // The filter below translates string "x,y,z" to array("x","y","z")
            'options' => 'ZF\Console\Filter\Explode',
            // The filter below translates string "x=one&y=two" to array("x"=>"one", "y" => "two")
            'params' => 'ZF\Console\Filter\QueryString'
        ]
    ],
];