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
	/*$("#contacts_form").submit(function(e) {
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
	});*/

    $(document).ready(function(){
        $('#add_product').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/product/add',
                data: $('#add_product').serialize(),
                success: function(result){
                    console.log("success", result);
                    var json = JSON.parse(result);
                    alert('Добавлен товар '+json['name']+' в количестве '+json['count']+' штук');
                },
                error: function() {
                	if(arguments[0]['status'] == 422) {
                        alert('Выберите корректное число данного товара');
					} else {
                        console.log("error", arguments);
                        alert('Ошибка при добавлении товара');
                    }
                }
            });
        });
    });

    $(document).ready(function(){
        $('#add_to_wishlist').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/wishlist',
                data: $('#add_to_wishlist').serialize(),
                success: function(result){
                    console.log("success", result);
                    if(result === "success")
                        alert('Добавлено в список желаний');
                    else if(result === "already")
                        alert('Этот товар уже есть в вашем списке желаний');
                },
                error: function() {
                	console.log("error", arguments);
                	alert('Ошибка при добавлении товара в список желаний');
                }
            });
        });
    });

    $(document).ready(function(){
        $('#make_billing').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/billing/make',
                data: $('#make_billing').serialize(),
                success: function(result){
                    console.log("success", result);
                    window.location.replace("http://elixirshop.local.com/");
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    errors = errors['errors'];

                    $("#error_firstname").html('');
                    $("#error_secondname").html('');
                    $("#error_email").html('');
                    $("#error_phone").html('');
                    $("#error_address").html('');

                    if("firstname" in errors)
                        $("#error_firstname").html(errors['firstname'][0]);
                    if("secondname" in errors)
                        $("#error_secondname").html(errors['secondname'][0]);
                    if("email" in errors)
                        $("#error_email").html(errors['email'][0]);
                    if("phone" in errors)
                        $("#error_phone").html(errors['phone'][0]);
                    if("address" in errors)
                        $("#error_address").html(errors['address'][0]);

                    console.log("error", errors);
                }
            });
        });
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




