<?php

declare(strict_types=1);

// Example of a local-only configuration file.
// This file is intentionally simple and only exists so the test
// project has something that looks like a local override.

return [
	'database' => [
		'dsn' => 'mysql:host=localhost;dbname=react_php_test',
		'user' => 'local_user',
		'password' => 'local_password',
	],
];
