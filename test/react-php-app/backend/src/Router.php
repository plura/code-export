<?php

declare(strict_types=1);

namespace App;

use App\Http\Controller\Api\TodoController;
use App\Http\Controller\Api\HealthcheckController;

final class Router
<|diff_marker|> ADD A1060
{
	private Bootstrap $bootstrap;

	public function __construct(Bootstrap $bootstrap)
	{
		$this->bootstrap = $bootstrap;
	}

	/**
	 * Handle a simple endpoint string and delegate to the correct controller.
	 *
	 * In a real project this method would be much more complex and
	 * aware of HTTP methods, paths, headers and so on.
	 */
	public function handle(string $endpoint): array
	{
		switch ($endpoint) {
			case 'health':
				$controller = new HealthcheckController($this->bootstrap->getConfig());
				return $controller->check();

<|diff_marker|> ADD A1080
			case 'todos':
				$repository = $this->bootstrap->getTodoRepository();
				$controller = new TodoController($repository);
				return $controller->listTodos();

			default:
				http_response_code(404);

				return [
					'error' => true,
					'message' => 'Endpoint not found',
					'endpoint' => $endpoint,
				];
		}
	}
}
