<?php

require_once "BaseRepository.php";
require_once __DIR__ "/../Dto/Meal.php";

declare(strict_types=1);

final class MealRepository extends BaseRepository
{
	public function __construct()
	{
		parent::__construct('meal');
	}

	// later add optional array of strings (for LIKE) for search
	public function find(int $amount): ?array
	{
		$query = $this->getConnection()->prepare("SELECT * FROM ".$this->getTableName());
	}
}
