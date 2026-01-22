import { Controller } from "https://unpkg.com/@hotwired/stimulus/dist/stimulus.js";

( async () => {
	if (!window.Stimulus) {
		console.log('Stimulus not initialized!');
		return;
	}

	window.Stimulus.register('beheer', class extends Controller {
		static targets = ['meal'];

		async delete(event) {
			const mealId = event.target.dataset.mealId;
			const meal = this.mealTargets.find(meal => {
				return meal.dataset.mealId === mealId;
			});

			meal.remove();

			const formData = new FormData();
			formData.append('mealId', mealId);

			await fetch('/meals/delete.php', { method: 'POST', body: formData });
		}
	});
})();
