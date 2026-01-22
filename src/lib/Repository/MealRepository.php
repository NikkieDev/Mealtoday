<?php

declare(strict_types=1);

require_once "BaseRepository.php";
require_once __DIR__ . "/../Dto/Meal.php";

final class MealRepository extends BaseRepository
{
	public function __construct()
	{
		parent::__construct('meal');
	}

	// later add optional array of strings (for LIKE) for search
	public function find(int $amount): ?array
	{
		$query = $this->getConnection()->prepare(
			"SELECT * FROM ".$this->getTableName()." LIMIT 100"
		);

		$query->execute();
		$results = $query->fetchAll();

		$records = [];
		foreach ($results as $result) {
			$records[] = new Meal(
				$result['id'],
				$result['name']
			);
		}

		return $records;
	}

	public function create(string $meal): Meal
	{
		$query = $this->getConnection()->prepare(
			"INSERT INTO ".$this->getTableName()." (`name`) VALUES (:mealName)"
		);

		$query->execute([':mealName' => $meal]);

		$lastId = $this->getConnection()->lastInsertId();
		$query = $this->getConnection()->prepare(
			"SELECT * FROM ".$this->getTableName()." WHERE id = :id"
		);

		$query->execute([':id' => $lastId]);
		$result = $query->fetchAll();

		$meal = new Meal(
			$result[0]['id'],
			$result[0]['name']
		);
		return $meal;
	}

	public function delete(int $id)
	{
		$query = $this->getConnection()->prepare(
			"DELETE FROM ".$this->getTableName()." WHERE id = :id "
		);

		$query->execute([':id' => $id]);
	}
}
