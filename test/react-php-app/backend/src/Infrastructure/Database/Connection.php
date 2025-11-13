<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

/**
<|diff_marker|> ADD A1280
 * Placeholder database connection class.
 *
 * In a real application this would wrap PDO or another driver, but for this
 * test project it only stores configuration values so other classes have
 * something realistic to type-hint against.
 */
final class Connection
{
	private string $dsn;

	private string $user;

	private string $password;

	public function __construct(string $dsn, string $user, string $password)
	{
		$this->dsn = $dsn;
		$this->user = $user;
		$this->password = $password;
	}
<|diff_marker|> ADD A1300

	public function getDsn(): string
	{
		return $this->dsn;
	}

	public function getUser(): string
	{
		return $this->user;
	}

	public function getPassword(): string
	{
		return $this->password;
	}
}
