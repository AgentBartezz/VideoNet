$(window).load(function(){
	$(".add-to-cart-btn").click(function() {
		var movie_name = $(this).attr("data-name");
		var movie_id = $(this).attr("data-id");
		var path = $(this).attr("data-path");
		$(this).addClass("added");
		$.ajax({
			type: "POST",
			url: "/~s176041/app_dev.php/cart/add",
			dataType: 'json',
			data: {
				movie_id : movie_id,
				movie_name : movie_name,
			},
			success: 
			function(response) {
				$('.cart-info').remove();
				if(response['status'] == "1") {
					$("#container").append("<div class='cart-info'><p>Dodano film do koszyka</p><br>Aktualna ilość elementów w koszyku: " + response['counter'] + "<br><a href='" + path + "'>PRZEJDŹ DO KOSZYKA</a><span class='cart-info-close'>ZAMKNIJ</span></div>");
				} if(response['status'] == "0") {
					$("#container").append("<div class='cart-info'><p>Nie można dodać tego filmu, spróbuj ponownie lub sprawdź czy już nie dodałeś tego filmu wcześniej</p><br>Aktualna ilość elementów w koszyku: " + response['counter'] + "<br><a href='" + path + "'>PRZEJDŹ DO KOSZYKA</a><span class='cart-info-close'>ZAMKNIJ</span></div>");
				}
			}
		});
	});
	
	$(".remove-from-cart").click(function() {
		var movie_name = $(this).attr("data-name");
		var movie_id = $(this).attr("data-id");
		$(this).addClass("removed");
		$.ajax({
			type: "POST",
			url: "/~s176041/app_dev.php/cart/remove",
			dataType: 'json',
			data: {
				movie_id : movie_id,
				movie_name : movie_name,
			},
			success: 
			function(response) {
				$(".removed").text("Usunięto").delay(1000).fadeOut(1000);
			},
			complete: 
			function(response) {
				location.reload();
			}
		});
	});
	$(".cart-info-close").click(function() {
		$(".cart-info").remove();
	});
});