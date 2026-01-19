<?php

declare(strict_types=1);

require_once __DIR__ . "/../../lib/Model/FormAction.php";

final class MealAdd extends FormAction 
{
	public function __construct()
	{
		parent::__construct();
	}
}

new MealAdd();
