/*preg_match("/[A-Z  | a-z]+/", $_POST['name'])*/

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
			let cardColumns = ``;
			let listItems = ``;
			result.forEach(function(item) {
				listItems += `
					<div class="card p-3">
					  <img class="card-img-top" src="../assets/images/${item.image}" alt="Card image cap">
					  <div class="card-body p-0 pt-2">
					    <h5 class="card-title mb-1"><a href="product.php?id=${item.id}">${item.name}</a></h5>
					    <p class="card-text mb-1">PHP ${item.price}</p>
					    <a href="#" class="btn btn-sm btn-outline-primary">Add To Cart</a>
					  </div>
					</div>
				`;
				cardColumns = `
					<div class="card-columns">
						${listItems}
					</div>
				`;
			});
			$(".products-container").html(cardColumns);
		} else {
			$(".products-container").html(`
				<h1> No Product Found. </h1>
			`);
		}
	}
});