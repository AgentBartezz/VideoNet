$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
	var width = $("body").width();
	
	if(width >= 720) {
		if (scroll >= 200) {
			$("#bars").removeClass("relative").removeClass("expanded-1").addClass("fixed").addClass("collapsed-1");
			$("#top-bar").removeClass("expanded-2").addClass("collapsed-2");
			$(".menu-item a").removeClass("expanded-2").addClass("collapsed-2");
		} else {
			$("#bars").removeClass("fixed").removeClass("collapsed-1").addClass("relative").addClass("expanded-1");
			$("#top-bar").removeClass("collapsed-2").addClass("expanded-2");
			$(".menu-item a").removeClass("collapsed-2").addClass("expanded-2");
		}
	}
});

function loginForm() {
	var scroll = $(window).scrollTop();
	var w = $(window).width();
	if(w > 768) {
	if($("#account-popup").is(":visible")) {
		if(scroll >= 200) {	
			$("#account-popup").removeAttr("style");
		}
		
		if(scroll < 200) {
			$("#account-popup").css("top", 340-scroll);	
		}
	}
	var b = $(window).height();
	if(b < 700) {
		$("#account-popup").css("top", 340-scroll);	
	}
	}
}

$(window).load(function() {
	$(".slider-news-link").first().fadeIn();
	$(".slider-top-link").first().fadeIn();
	$(".slider-hits-link").first().fadeIn();
	$(".slider-news-jumper").first().attr("disabled", "disabled");
	$(".slider-top-jumper").first().attr("disabled", "disabled");
	$(".slider-hits-jumper").first().attr("disabled", "disabled");
	$(".toggle-menu").click(function() {
		$("#menu").toggleClass("collapsed-3").toggleClass("expanded-3");
		$(this).toggleClass("menu-expanded");
	});
	
	$(".dropdown").click(function() {
		$(this).toggleClass("dropdown-expanded");
		$("#account-dropdown").slideToggle();
		$("#overlay").fadeToggle();
	});

	$(".account-popup-hidden").click(function() {
		if($("#account-popup").is(":visible")) {
			$("#overlay").delay(200).fadeOut();
			$("#account-popup").addClass("col");
		}
		else {
			$("#overlay").fadeIn();
			$("#account-popup").removeClass("col");
		}
		loginForm();
		$(window).scroll(function() { 
			loginForm();
		});
	});
	
	$(".close-popup").click(function() {
		$("#overlay").delay(200).fadeOut();
		$("#account-popup").addClass("col");
	});
	
	$(".account-popup-option").click(function() {
		var t = $(this).attr("data-target");
		var c = $(this).text();
		$(".account-popup-option").removeClass("popup-option-active");
		$(this).addClass("popup-option-active");
		if($("#"+ t).is(":hidden")) {
			$("#popup-right-box").children(":visible").fadeOut();
			$("#"+ t).fadeIn();
		}
		$(".popup-header-inner").text(c);
		
	});
	
	$("#search-input").focus(function() {
		$("#search-results-outer").slideDown(500);
		
		$(this).keypress(function(){
		});
		
		$(this).blur(function(){
			$("#search-results-outer").slideUp();	
		});	
	});
	
	$(".jump-to-trailer").click(function() {
		var s = $(this).attr("data-src");
		$(".trailer-player").remove();
		$("#trailers-container").append("<video class='trailer-player' width='100%' height='100%' controls><source class='trailer-player-source' src='" + s + "' type='video/mp4'></video>");
		$(this).closest("#slider-trailers").find(".jump-to-trailer").removeClass("active");
		$(this).addClass("active");
	});
	
	$(".mobile-jump-to-trailer").click(function() {
		var video = $(this).attr("data-src");
		$("#overlay").fadeIn(400).append("<video class='trailer-player' width='100%' height='50%' controls><source class='trailer-player-source' src='" + video + "' type='video/mp4'></video><button class='video-mobile-close'>ZAMKNIJ</button>");
	});
	
	$("body").on("click" ,".video-mobile-close", function() {
		$("#overlay").fadeOut(400).find(".trailer-player").remove();
		$(this).remove();
	});
	
	$("#news-prev").click(function() {
		var i = $(this).attr("data-slide");
		if(i==0){p=9;}else{p=i-1;}if(p==9){n=1;}else if(p==8){n=0;}else{n=p+2;}
		$(".slider-news-link").fadeOut(400);
		$(".slider-news-link").eq(i).fadeIn(400);
		$(this).attr("data-slide", p);
		$("#news-next").attr("data-slide", n);
		$(".slider-news-jumper").removeAttr("disabled");
		$(".slider-news-jumper").eq(i).attr("disabled", "disabled");
	});
	
	$("#news-next").click(function() {
		var i = $(this).attr("data-slide");
		if(i==9){n=0;}else{n=i-1;n=n+2}if(n==0){p=8;}else if(n==1){p=9;}else{p=n-2;}
		$(".slider-news-link").fadeOut(400);
		$(".slider-news-link").eq(i).fadeIn(400);
		$(this).attr("data-slide", n);
		$("#news-prev").attr("data-slide", p);
		$(".slider-news-jumper").removeAttr("disabled");
		$(".slider-news-jumper").eq(i).attr("disabled", "disabled");;
	});
	
	$(".slider-news-jumper").click(function(){
		var i = $(this).index();
		if(i==0){p = 9}else{p = i - 1;}
		if(p==9){n = 1}else if(p==8){n = 0;}else{n = p + 2;}
		$(".slider-news-link").fadeOut(400);
		$(".slider-news-link").eq(i).fadeIn(400);
		$("#news-next").attr("data-slide", n);
		$("#news-prev").attr("data-slide", p);
		$(".slider-news-jumper").removeAttr("disabled");
		$(this).attr("disabled", "disabled");
	});
	
	$(".slider-top-jumper").click(function(){
		var i = $(this).index();
		$(".slider-top-link").fadeOut(400);
		$(".slider-top-link").eq(i).fadeIn(400);
		$(".slider-top-jumper").removeAttr("disabled");
		$(this).attr("disabled", "disabled");
	});
	
	$(".slider-hits-jumper").click(function(){
		var i = $(this).index();
		$(".slider-hits-link").fadeOut(400);
		$(".slider-hits-link").eq(i).fadeIn(400);
		$(".slider-hits-jumper").removeAttr("disabled");
		$(this).attr("disabled", "disabled");
	});
	
	$("body").on("click", "span.cart-info-close" ,function() {
		$(".cart-info").remove();
	});
	
	
	
	
});