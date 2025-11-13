<?php

declare(strict_types=1);

namespace App\Tests\Http\Controller\Api;

use App\Domain\Todo\TodoRepository;
use App\Infrastructure\Database\Connection;
use App\Http\Controller\Api\TodoController;
use PHPUnit\Framework\TestCase;

/**
 * Small example test to make the folder structure look realistic.
 *
 * This test does not need to be exhaustive; it is enough that it exercises
 * the controller in a very simple way so the concatenated output has
 * something that looks like a unit test.
<|diff_marker|> ADD A1340
 */
final class TodoControllerTest extends TestCase
{
	public function testListTodosReturnsAtLeastOneItem(): void
	{
		$connection = new Connection('sqlite::memory:', '', '');
		$repository = new TodoRepository($connection);
		$controller = new TodoController($repository);

		$response = $controller->listTodos();

		$this->assertArrayHasKey('items', $response);
		$this->assertIsArray($response['items']);
		$this->assertNotEmpty($response['items']);
	}
}
