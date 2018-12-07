$(document).ready(function(){
	$(document).on("click", ".item-remove", function(e){
		e.stopPropagation();
		let item_id = $(e.target).data("id");

		console.log("Deleted " + item_id);

		$.ajax({
			"url":"../controllers/updatecart.php",
			"type":"POST",
			"data":{
				"item_id":item_id,
				"item_quantity":0,
				"ifFromCatalogPage":0
			},
			"success":function(dataFromController){
				$(e.target).parents('tr').remove();
				//removes the parent of the target, so.. that the entire row will be deleted
				$("#cart-count").text(dataFromController);
				let total = 0;
				//get all the .item_subtotal's values and add them all up.
				$(".item_subtotal").each(function(e){
					//for each element with class = "item_subtotal"
					total += parseFloat($(this).text());
				});
				$("#total_price").text(total.toFixed(2));
			}
		})
	})
});