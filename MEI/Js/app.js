// Identificar o clique no menu
// Verificar o item que foi clicado e fazer referÃªncia com o alvo
// Verificar a distÃ¢ncia entre o alvo e o topo
// Animar o scroll atÃ© o alvo

// Scroll suave para link interno
$(' nav a[href^="#"], #home a, #funcionalidades a').click(function(e){
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
	}
	// SCROLLSPY--FUNCIONALIDADES
	if(scroll+( $('nav').innerHeight()) > $("#anchorfunction").offset().top && scroll < $("#anchorcard").offset().top-( $('nav').innerHeight())){
		$("#functions").css("background-color", "#0182ca");
	}else{
		$("#functions").css("background-color", "#041e41");
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