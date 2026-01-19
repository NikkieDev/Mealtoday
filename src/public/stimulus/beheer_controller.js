import { Controller } from "https://unpkg.com/@hotwired/stimulus/dist/stimulus.js";

( async () => {
	if (!window.Stimulus) {
		console.log('Stimulus not initialized!');
		return;
	}

	window.Stimulus.register('beheer', class extends Controller {
		static targets = ['meal'];

		delete(event) {
			const mealId = event.target.dataset.mealId;
			const meal = this.mealTargets.find(meal => {
				return meal.dataset.mealId === mealId;
			});

			meal.remove();
			// delete with ajax
		}
	});
})();
