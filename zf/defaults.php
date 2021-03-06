<?php

use zf\Delayed;

return [
	'debug'       => false,
	'pretty'      => false,
	'dist'        => false,
	'extract'     => false,
	'mockup'      => false,

	'events' => [
		'response' => 'about to send the response',
		'exception' => 'an uncaught exception was thrown',
		'error' => 'error occoured',
		'shutdown' => 'shutting down',
		'validationfailed' => 'input validation failed',
	],

	'use' => ['response', 'json', 'smartResponse', 'bodyParser'],

	'components' => [
		'helper' => 'ClosureSet', [
			'context' => $this,
			'path' => 'helpers',
			'namespace' => 'helpers',
		],
		'handlers' => 'ClosureSet', [
			'context' => $this,
			'path' => 'handlers',
			'namespace' => 'handlers',
		],
		'middlewares' => 'ClosureSet', [
			'context' => $this,
			'path' => 'middlewares',
			'namespace' => 'middlewares',
			'closures' => require __DIR__ . DIRECTORY_SEPARATOR . 'middlewares.php'
		],
		'resource' => 'ClosureSet', [
			'context' => $this,
			'path' => 'resources',
			'namespace' => 'resources',
		],
		'validator' => 'Validator', [
			'schemaPath' => 'schemas',
		],
		'engine' => 'ViewEngine' , [
			'path' => 'views',
			'extension' => '.php',
			'context' => $this,
		],
		'request' => 'Request',
		'response' => $this->isCli ? 'CliResponse' : 'Response',
		'params' => 'Params',
        'query' => 'Query',
		'session' => 'Session',
		'cookie' => 'Cookie',
		'router' => $this->isCli ? 'CliRouter' : 'WebRouter',
	],
];
