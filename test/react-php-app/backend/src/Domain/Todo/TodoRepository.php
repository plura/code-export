<?php

declare(strict_types=1);

namespace App\Domain\Todo;

use App\Infrastructure\Database\Connection;

<|diff_marker|> ADD A1240
/**
 * Very small repository implementation.
 *
 * For this test project we do not actually talk to a database. The repository
 * simply returns a static list so the surrounding code has something to work with.
 */
final class TodoRepository
{
	private Connection $connection;

	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * @return Todo[]
	 */
	public function findAll(): array
	{
<|diff_marker|> ADD A1260
		return [
			new Todo(1, 'Review React components in the test app', false),
			new Todo(2, 'Check PHP backend controllers and domain layer', true),
			new Todo(3, 'Adjust code-export JSON configuration', false),
		];
	}
}
