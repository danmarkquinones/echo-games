let listCardItems = {
	template: ``
};

function displayCardItems(item) {
	listCardItems.template += `
		<div class="card p-3">
		  <img class="card-img-top" src="../assets/images/${item.image}" alt="Card image cap">
		  <div class="card-body p-0 pt-2">
		  <p>SALE 50% </p>
		    <h5 class="card-title mb-1"><a href="product.php?id=${item.id}">${item.name}</a></h5>
		    <p class="card-text mb-1">PHP ${item.price}</p>
		    <input type="number" class="form-control mb-2" value=1>
		    <btn href="#" class="btn btn-sm btn-outline-primary add-cart" data-id="${item.id}">Add To Cart</btn>
		  </div>
		</div>
	`;
}

export {displayCardItems, listCardItems};