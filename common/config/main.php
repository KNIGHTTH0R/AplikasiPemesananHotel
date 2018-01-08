<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\redis\Cache',
        ],
        'authClientCollection' => [
	        'class' => 'yii\authclient\Collection',
	        'clients' => [
	            'google' => [
	                'class' => 'yii\authclient\clients\Google',
	                'clientId' => '340978467385-fuapekf9b1ave9seitvjfplipa55fjjm.apps.googleusercontent.com',
                	'clientSecret' => '946GgMLfJXxeJdkjO7IYU2hr',
	            ],
	        ],
	    ]
    ],
];
