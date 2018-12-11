$(document).ready(function() {
	const main = $("#main");
	const mainOffset = main.offset();

	const header = $("#echo-header");

	$(window).on("scroll", function(e) {
	  if ($(this).scrollTop() > mainOffset.top + 200) {
	    header.addClass("fixed-top");
	    main.addClass("fixed-void");
	  } else {
	    header.removeClass("fixed-top");
	    main.removeClass("fixed-void");
	  }
	});



});
	$(".add-cart").on("click", function(){
		 // Get the snackbar DIV
		  var x = document.getElementById("snackbar");

		  // Add the "show" class to DIV
		  x.className = "show";

		  // After 3 seconds, remove the show class from DIV
		  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	})