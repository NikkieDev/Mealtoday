<?php

declare(strict_types=1);

final class Meal
{
	public function __construct(
		private readonly int $id,
		private readonly string $name,
	) {
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
}
