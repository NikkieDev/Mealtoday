<?php

declare(strict_types=1);

require_once __DIR__ . "/../../lib/Repository/MealRepository.php";

final class MealDelete 
{
	private MealRepository $mealRepository;

	public function __construct()
	{
		$this->mealRepository = new MealRepository();
		header('Content-Type: application/json; charset=utf-8');
		$this->index();
	}

	private function index()
	{
		if (!isset($_POST['mealId'])) {
			http_response_code(400);
			return 'Missing: mealId';
		};

		$this->mealRepository->delete((int) $_POST['mealId']);	
		return 'ok';
	}
}

new MealDelete();
