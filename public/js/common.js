$(document).ready(function() {

	$(".nav_button").click(function() {
		$(".navigation ul").slideToggle();
		$(".navigation").toggleClass("bgc");
	});

	
	// handle links with @href started with '#' only
	$(document).on('click', 'a[href^="#"]', function(e) {
	    // target element id
	    var id = $(this).attr('href');
	    
	    // target element
	    var $id = $(id);
	    if ($id.length === 0) {
	    	return;
	    }
	    
	    // prevent standard hash navigation (avoid blinking in IE)
	    e.preventDefault();
	    
	    // top position relative to the document
	    var pos = $id.offset().top;
	    
	    // animated top scrolling
	    $('body, html').animate({scrollTop: pos});
	  });

	$(".popup").magnificPopup({type:"image"});//открытие картинки при клике
	$(".popup_c").magnificPopup();
	

	function wResize(){
		$(".header").css("min-height", $(window).height());
		$(".content").css("min-height", $(window).height());
		if($(window).width() > 1500) {
			$(".image").css("height", $(window).height());
			$(".image").css("width", 600);
		}
		else if($(window).width() > 1200) {
			$(".image").css("height", $(window).height());
			$(".image").css("width", 450);
		} else {
			$(".image").css("height", $(window).height()/2);
			$(".image").css("width", $(window).width());
		} 
		$(".price").css("min-height", $(window).height());
		$(".contacts").css("min-height", $(window).height());
		
		
	};
	wResize();

	$(window).resize(function(){
		wResize()

	location.reload();

	});




// slick...
$(".slider_products").slick({
	slidesToShow: 3,
	slidesToScroll: 3,
	infinite: true,
	arrows: false,
	autoplay: true,
	autoplaySpeed: 4000,
	draggable: true,
	dots: true,
	responsive: [
	{
		breakpoint: 992,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 2

		}
	},
	{
		breakpoint: 768,
		settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		}
	}

	]});




	//Цели для Яндекс.Метрики и Google Analytics
	$(".count_element").on("click", (function() {
		ga("send", "event", "goal", "goal");
		yaCounterXXXXXXXX.reachGoal("goal");
		return true;
	}));

	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};

	
	/*$(".carousel").slick({
	slidesToShow: 1,
  	slidesToScroll: 1,
  	arrows: false,
  	autoplay: true,
  	autoplaySpeed: 4000,
	dots: false
	  });

	$(".next_button").click(function(){
		$(".carousel").slick('slickNext');
	});
	$(".prev_button").click(function(){
		$(".carousel").slick('slickPrev');
	});*/

	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
	$("#contacts_form").submit(function(e) {
		var ths = $(this);
		e.preventDefault;
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: $(this).serialize()
		}).done(function() {
			alert("Спасибо за заявку!");
			setTimeout(function() {
				var magnificPopup = $.magnificPopup.instance;
				magnificPopup.close();
				ths.trigger("reset");
			}, 1000);
		});
		return false;
	});
	
});

$(window).scroll(function(){

	var st = $(this).scrollTop();
	$(".logo_wrap").css({
		"transform" : "translate(0%, " + st/2 + "%"
	});
});

$(window).load(function(){

	$(".content .top_left").animated("fadeInDown", "fadeOut");
	$(".content .text").animated("fadeInUp", "fadeOut");
	$(".content .top_right").animated("fadeInRight", "fadeOut");
	$(".content .comment").animated("fadeInLeft", "fadeOutRight");
	$(".price .from_right").animated("fadeInRight", "fadeOut");
	$(".price .from_left").animated("fadeInLeft", "fadeOut");
	$(".price .title_price").animated("fadeInDown", "fadeOut");
	$(".contacts .wrap_link").animated("fadeInRight", "fadeOut");
	$(".contacts #contacts_form").animated("fadeInLeft", "fadeOut");
	$(".contacts .wrap").animated("fadeInDown", "fadeOut");
});


if(($(window).width()>=1366) && ($(window).height()>=768)){

	var options = {
    mode: "vp", // "vp", "set"
    autoHash: false,
    sectionScroll: true,
    initialScroll: true,
    keepHistory: false,
    sectionWrapperSelector: ".section-wrapper",
    sectionClass: "section",
    animationSpeed: 700,
    headerHash: "header",
    breakpoint: null,
    eventEmitter: null,
    dynamicHeight: false
  };
  $.smartscroll(options);

}
