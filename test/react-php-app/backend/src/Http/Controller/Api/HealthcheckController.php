<?php

declare(strict_types=1);

namespace App\Http\Controller\Api;

final class HealthcheckController
{
	private array $config;

	public function __construct(array $config)
<|diff_marker|> ADD A1160
	{
		$this->config = $config;
	}

	public function check(): array
	{
		return [
			'error' => false,
			'status' => 'ok',
			'environment' => $this->config['environment'] ?? 'unknown',
		];
	}
}
