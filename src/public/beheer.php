<?php

require_once __DIR__ "/../lib/Dto/Meal.php";
require_once __DIR__ "/../lib/Repository/MealRepository.php";

$meals = (new MealRepository())->find(100) ?? [];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="title" content="Mealtoday">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<script type="module" defer src="stimulus/init.js"></script>
		<script type="module" defer src="stimulus/beheer_controller.js"></script>
	</head>
	<body data-bs-theme="dark">
		<div class="container py-4 col-12">
			<div>
				<div class="row">
					<h1>Maaltijden beheren</h1>
				</div>
				<div class="row px-3">
					<a href="/" class="btn btn-danger col-2">Terug</a>
				</div>
			</div>
			<form class="card my-4" method="POST" action="meals/add.php">
				<div class="card-body">
					<h3 class="card-title">Maaltijd toevoegen</h3>
					<div class="input-group">
						<input type="text" id="mealName" class="form-control" placeholder="Maaltijd" />
						<button type="button" id="submit" class="btn btn-lg btn-primary">+</button>
					</div>
				</div>
			</form>
			<div class="card my-4">
				<div class="card-body">
					<h3 class="card-title">Maaltijden</h3>
					<form class="col-6" method="GET">
						<div class="input-group">
							<input type="text" id="mealName" class="form-control" placeholder="Zoeken op recept" />
							<button type="submit" class="btn btn-primary">&#x1F50E;</button>
						</div>
					</form>
					<hr>
					<div data-controller="beheer" id="meals-wrapper">
					<?php
						/**
						 * @var Meal $meal
						 **/
						 foreach ($meals as $meal) : ?>
							<div data-beheer-target="meal" data-meal-id="<?= $meal->getId(); ?>" class="row input-group">
								<p class="col-11 d-flex align-items-center m-0 input-group-text"><?= $meal->getName(); ?></p>
								<button
									class="col-1 btn btn-danger btn-lg border-0"
									data-action="beheer#delete"
									data-meal-id="<?= $meal->getId(); ?>"
								>x</button>	
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

