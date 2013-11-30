<?php

return [

	'components' => [
		'redis:Redis' => [
			'dbs' => [
				'default' => [
					'host'     => 'localhost',
					'pconnect' => true,
				]
			]
		],
		'mongo:Mongo' => [
			'config' => [
				'users','posts','files:GridFS' => [
					'url'        => 'mongodb://localhost:27017',
					'database'   => 'project',
					// 'options'    => ['readPreference' => MongoClient::RP_SECONDARY_PREFERRED],
				]
			]
		],
		'db:PDO' => [
			'config' => [
				'dsn' => 'mysql:host=localhost;dbname=mysql;charset=utf8',
				'username' => 'root',
				'password' => 'secret',
				'queries' => [
					'users' => [
						'list' =>
						'select User,Host from user limit :skip,:limit',
					]
				],
			]
		],
	],
];
