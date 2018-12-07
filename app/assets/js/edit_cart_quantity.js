$(document).ready(function(){
	$(".item_quantity>input").on("input", function(e){
		let item_id = $(e.target).data("id"); //sa data-id ng item
		let new_quantity = parseInt($(e.target).val()); //target mo kasi yung nasa input
		let price = parseFloat($(e.target).parents("tr").find(".item_price").text()); //find the parent tr of selected element and find the children named .item_price

	 console.log("Item to edit " + item_id);
	 console.log("New Quantity " + new_quantity);
	 console.log("Price " + price);
	 console.log("New subtotal " + (new_quantity*price));

		 let subTotal = (new_quantity*price).toFixed(2);
		 $(e.target).parents("tr").find(".item_subtotal").text(subTotal);

		 //ajax sending to controller
		 $.ajax({
		 	"url":"../controllers/updatecart.php",
		 	"type":"POST",
		 	"data":{
		 		"item_id":item_id,
		 		"item_quantity":new_quantity,
		 		"ifFromCatalogPage":0
		 	},
		 	"success": function(dataFromController){
		 		//TO DO : update the cart quantity in the badge - kahit ano nasa loob ng funtion pwedeng jsondata/data
		 		$("#cart-count").text(dataFromController);
		 		let total = 0;
		 		//get all the .item_subtotal's values and add them all up.
				$(".item_subtotal").each(function(e){
					//for each element with class = "item_subtotal"
					total += parseFloat($(this).text());
				});
				$("#total_price").text(total);
		 	}
		 })
	})



});