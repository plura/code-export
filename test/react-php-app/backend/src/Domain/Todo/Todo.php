<|diff_marker|> ADD A1180
<?php

declare(strict_types=1);

namespace App\Domain\Todo;

final class Todo
{
	private int $id;

	private string $title;

	private bool $completed;

	public function __construct(int $id, string $title, bool $completed = false)
	{
		$this->id = $id;
		$this->title = $title;
		$this->completed = $completed;
	}

<|diff_marker|> ADD A1200
	public function getId(): int
	{
		return $this->id;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function isCompleted(): bool
	{
		return $this->completed;
	}

	public function markCompleted(): void
	{
		$this->completed = true;
	}

<|diff_marker|> ADD A1220
	public function markPending(): void
	{
		$this->completed = false;
	}
}
