<?php

declare(strict_types=1);

namespace App\Http\Controller\Api;

use App\Domain\Todo\TodoRepository;

final class TodoController
{
	private TodoRepository $repository;

	public function __construct(TodoRepository $repository)
	{
		$this->repository = $repository;
	}

<|diff_marker|> ADD A1120
	/**
	 * Return a list of todos.
	 *
	 * The returned structure is intentionally small and predictable so it can be
	 * used in examples on the React side or inspected in concatenated exports.
	 */
	public function listTodos(): array
	{
		$todos = $this->repository->findAll();

		return [
			'error' => false,
			'items' => array_map(static function ($todo): array {
				return [
					'id' => $todo->getId(),
					'title' => $todo->getTitle(),
					'completed' => $todo->isCompleted(),
				];
			}, $todos),
		];
<|diff_marker|> ADD A1140
	}
}
