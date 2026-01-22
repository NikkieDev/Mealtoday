<?php

declare(strict_types=1);

require_once __DIR__ . "/../../lib/Model/FormAction.php";
require_once __DIR__ . '/../../lib/Dto/Meal.php';
require_once __DIR__ . "/../../lib/Repository/MealRepository.php";

final class MealAdd extends FormAction 
{
	private MealRepository $mealRepository;

	public function __construct()
	{
		parent::__construct();

		$this->mealRepository = new MealRepository();
		$this->index();
	}

	public function index()
	{
		if (!isset($_POST['mealName'])) {
			return self::BadRequest('mealName');
		}

		$this->mealRepository->create($_POST['mealName']);
		$this->Redirect();
	}
}

new MealAdd();
