$(document).ready(function() {
	const listItems = $(".list-group-item");

	listItems.each(function() {
		$(this).click(function() {
			let obj = {
				"catId": $(this).attr("id")
			};
			$.ajax({
				"url": "../controllers/show_by_category.php",
				"type": "POST",
				"data": obj,
				"success": filterByCatId
			});
		});
	});

	function filterByCatId(jsondata) {
		if(jsondata !== "") {
			const filteredItems = JSON.parse(jsondata);
			let cardColumns = ``;
			let listItems = ``;
			filteredItems.forEach(function(item) {
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
		}
	}
});