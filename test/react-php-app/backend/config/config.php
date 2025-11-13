<?php

declare(strict_types=1);

return [
	'environment' => 'local',
	'debug' => true,

	// In a real project these values would be loaded from env.local.php
	// or a similar secrets file that is not committed to version control.
	'database' => [
		'dsn' => 'mysql:host=localhost;dbname=react_php_test',
		'user' => 'root',
		'password' => '',
	],
];
