<?php
return [
	'modules' => [
		'yii2images' => [
			'class' => 'rico\yii2images\Module',
			//be sure, that permissions ok
			//if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
			'imagesStorePath' => '@upload/store', //path to origin images
			'imagesCachePath' => '@upload/cache', //path to resized copies
			'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
			'placeHolderPath' => '@upload/store/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
			'imageCompressionQuality' => 100, // Optional. Default value is 85.
		],
	],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
		'@img'	=> '/frontend/web/img',
],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
		'geoip' => ['class' => 'lysenkobv\GeoIP\GeoIP'],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
	'controllerMap' => [
		'elfinder' => [
			'class' => 'mihaildev\elfinder\PathController',
			//'access' => ['admin'],
			/*'plugin' => [//для транслита
				[
					'class'=>'\mihaildev\elfinder\plugin\Sluggable',
					'lowercase' => true,
					'replacement' => '-'
				]
			],*/
			'root' => [
				'baseUrl' => '',
				'path' => '../../frontend/web/upload/global/',
				'name' => 'Global',
				/*'plugin' => [
					'Sluggable' => [
						'lowercase' => false,
					]
				],*/
				'options' => [
					'uploadDeny' => array('all'),                // All Mimetypes not allowed to upload
					'uploadAllow' => array('image', 'text/plain', 'application/rtf', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),// Mimetype `image` and `text/plain` allowed to upload
					'uploadOrder' => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				],
			],

		]
	],
];
