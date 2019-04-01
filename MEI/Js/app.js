// Identificar o clique no menu
// Verificar o item que foi clicado e fazer referÃªncia com o alvo
// Verificar a distÃ¢ncia entre o alvo e o topo
// Animar o scroll atÃ© o alvo

// Scroll suave para link interno
$(' nav a[href^="#"]').click(function(e){
	e.preventDefault();
	var id = $(this).attr('href'),
			menuHeight = $('nav').innerHeight(),
			targetOffset = $(id).offset().top;
	$('html, body').animate({
		scrollTop: targetOffset - menuHeight
	}, 800);
})

$(window).scroll(function(){
	var scroll = $(window).scrollTop();
	// SCROLLSPY--NOSSA EMPRESA
	if(scroll+( $('nav').innerHeight()) > $("#anchorempresa").offset().top && scroll < $("#anchorfunction").offset().top-( $('nav').innerHeight())){
		$("#ourenterprise").css("background-color", "#0182ca");
	}else{
		$("#ourenterprise").css("background-color", "#041e41");
		var element = document.getElementById("nossas");
  		element.classList.add("animated");
	}
	// SCROLLSPY--FUNCIONALIDADES
	if(scroll+( $('nav').innerHeight()) > $("#anchorfunction").offset().top && scroll < $("#anchorplanos").offset().top-( $('nav').innerHeight())){
		$("#functions").css("background-color", "#0182ca");
	}else{
		$("#functions").css("background-color", "#041e41");
	}
	// SCROLL--PLANOS
	if(scroll+( $('nav').innerHeight()) > $("#anchorplanos").offset().top && scroll < $("#anchorcard").offset().top-( $('nav').innerHeight())){
		$("#plans").css("background-color", "#0182ca");
	}else{
		$("#plans").css("background-color", "#041e41");
	}	
	// SCROLLSPY--NOTICIAS
	if(scroll+( $('nav').innerHeight()) > $("#anchornews").offset().top && scroll < $("#anchorcontatos").offset().top-( $('nav').innerHeight())){
		$("#notice").css("background-color", "#0182ca");
	}else{
		$("#notice").css("background-color", "#041e41");
	}
	// SCROLLSPY--CONTATOS
	if(scroll+( $('nav').innerHeight()) > $("#anchorcontatos").offset().top){
		$("#contacts").css("background-color", "#0182ca");
	}else{
		$("#contacts").css("background-color", "#041e41");
	}
});
$(window).scroll(function(){
	$("#homeLogo").css("opacity", 1 - $(window).scrollTop() / 200);
});
$(window).scroll(function(){
	$("#navLogo").css("opacity", 0 + $(window).scrollTop() / 200);
});

 //------- Owl Carusel  js --------//  

 $('.active-review-carusel').owlCarousel({
	items:1,
	loop:true,
	autoplay:true,
	autoplayHoverPause: true,        
	margin:30,
	dots: true
});

 $('.active-testimonial').owlCarousel({
		items: 2,
		loop: true,
		margin: 30,
		autoplayHoverPause: true,
		dots: true,
		autoplay: true,
		nav: true,
		navText: ["<span class='lnr lnr-arrow-up'></span>", "<span class='lnr lnr-arrow-down'></span>"],
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1,
			},
			768: {
				items: 2,
			}
		}
	});



$('.active-brand-carusel').owlCarousel({
	items: 5,
	loop: true,
	autoplayHoverPause: true,
	autoplay: true,
	responsive: {
		0: {
			items: 1
		},
		455: {
			items: 2
		},            
		768: {
			items: 3,
		},
		991: {
			items: 4,
		},
		1024: {
			items: 5,
		}
	}
}); 


$('.active-news').owlCarousel({
	items: 2,
	loop: true,
	margin: 30,
	autoplayHoverPause: true,
	dots: true,
	autoplay: true,
	nav: true,
	navText: ["<span class='lnr lnr-arrow-left'></span>", "<span class='lnr lnr-arrow-right'></span>"],
	responsive: {
		0: {
			items: 1
		},
		480: {
			items: 1,
		},
		768: {
			items: 2,
		}
	}
});