<?php

declare(strict_types=1);

use App\Bootstrap;
use App\Http\Router;

require __DIR__ . '/../src/Bootstrap.php';

// Bootstrap and create the router
$bootstrap = new Bootstrap(__DIR__ . '/../config');
$router = new Router($bootstrap);

// Resolve the endpoint. In a real application you might inspect the
// HTTP method and path; here we keep it intentionally simple.
$endpoint = isset($_GET['endpoint']) ? (string) $_GET['endpoint'] : '';

header('Content-Type: application/json; charset=utf-8');

try {
	$response = $router->handle($endpoint);

	echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
} catch (Throwable $exception) {
	http_response_code(500);

	echo json_encode([
		'error' => true,
		'message' => 'Unexpected error in API',
		'details' => $exception->getMessage(),
	]);
}
