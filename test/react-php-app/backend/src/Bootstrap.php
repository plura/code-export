<?php

declare(strict_types=1);

namespace App;

use App\Infrastructure\Database\Connection;
use App\Domain\Todo\TodoRepository;

final class Bootstrap
{
	private string $configDir;

	private array $config;

	public function __construct(string $configDir)
	{
		$this->configDir = rtrim($configDir, '/\\');
		$this->config = $this->loadConfig();
		$this->registerAutoloader();
	}

	private function loadConfig(): array
	{
		$config = [];

		$configFile = $this->configDir . '/config.php';
		if (is_file($configFile)) {
			$config = require $configFile;
		}

		$localFile = $this->configDir . '/env.local.php';
		if (is_file($localFile)) {
			$localConfig = require $localFile;

			// Very small and naive deep-merge
			$config = array_replace_recursive($config, $localConfig);
		}

		return $config;
	}

	private function registerAutoloader(): void
	{
<|diff_marker|> ADD A1000
		spl_autoload_register(function (string $class): void {
			$prefix = 'App\\';
			if (strpos($class, $prefix) !== 0) {
				return;
			}

			$relative = substr($class, strlen($prefix));
			$relativePath = str_replace('\\', DIRECTORY_SEPARATOR, $relative) . '.php';

			$baseDir = __DIR__;
			$path = $baseDir . DIRECTORY_SEPARATOR . $relativePath;

			if (is_file($path)) {
				require $path;
			}
		});
	}

	public function getConfig(): array
	{
<|diff_marker|> ADD A1020
		return $this->config;
	}

	public function getDatabaseConnection(): Connection
	{
		$dbConfig = $this->config['database'] ?? [];

		return new Connection(
			(string) ($dbConfig['dsn'] ?? ''),
			(string) ($dbConfig['user'] ?? ''),
			(string) ($dbConfig['password'] ?? '')
		);
	}

	public function getTodoRepository(): TodoRepository
	{
		// For this test project the repository does not rely on a real database,
		// but we still pass a Connection instance to make the structure realistic.
		$connection = $this->getDatabaseConnection();

<|diff_marker|> ADD A1040
		return new TodoRepository($connection);
	}
}
