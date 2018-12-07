$(document).ready(function(){
	const cartBtn = $(".add-cart");

	$(this).on("click", ".add-cart" , function(e) {
		e.stopPropagation(); //prevent parent elemens to be triggered
		let item_id = $(e.target).attr("data-id");
		let item_quantity = Math.abs(parseInt($(e.target).prev().val()));

		$.ajax({
			"url":"../controllers/updatecart.php",
			"data":{
				"item_id":item_id,
				"item_quantity":item_quantity
			},
			"type":"POST",
			"success":function(dataFromController){
				$("#cart-count").text(dataFromController);
			}
		});
	});
});