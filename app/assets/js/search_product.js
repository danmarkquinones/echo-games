/*preg_match("/[A-Z  | a-z]+/", $_POST['name'])*/
import{displayCardItems , listCardItems} from "./function_templates.js";

$(document).ready(function() {
	const searchForm = $("#search-form");

	searchForm.keypress(function(e) {
		// 13 is the keycode for 'enter' key
		if(e.which == 13) {
			$.ajax({
				"url": "../controllers/search_product.php",
				"type": "POST",
				"data": {
					"search": (searchForm.val()).toLowerCase()
				},
				"success": getResults
			});
		}
	});

	function getResults(jsondata) {
		if(jsondata !== "") {
			const result = JSON.parse(jsondata);
			listCardItems.template = ``;
			result.forEach(displayCardItems);
			let cardColumns = `
				<div class="card-columns">
					${listCardItems.template}
				</div>
			`;
			$(".products-container").html(cardColumns);
		} else {
			$(".products-container").html(`
				<h1> No Product Found. </h1>
			`);
		}
	}
});