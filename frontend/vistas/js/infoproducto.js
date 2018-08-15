/*============================
=           CARRUSEL         =
============================*/

$(".flexslider").flexslider({

	animation: "slide",
	controlNav: true, 
	animationLoop:false,
	slideshow: false,
	itemWidth: 100,
	itemMargin: 5

});

$(".flexslider ul li img").click(function(){

	var capturaIndice = $(this).attr("value");

	$(".infoproducto figure.visor img").hide();

	$("#lupa"+capturaIndice).show();

});

/*============================
=        EFECTO LUPA         =
============================*/

$(".infoproducto figure.visor img").mouseover(function(event){

	var capturaImg = $(this).attr("src");

	$(".lupa img").attr("src", capturaImg);

	$(".lupa").fadeIn("fast");

	$(".lupa").css({

		"height":$("visorImg").height()+"px",
		"background":"#eee",
		"width":"100%"

	})

})

$(".infoproducto figure.visor img").mouseout(function(event){

	$(".lupa").fadeOut("fast");

})

$(".infoproducto figure.visor img").mousemove(function(event){

	var posX = event.offsetX;
	var posY = event.offsetY;

	$(".lupa img").css({

		"margin-left":-posX+"px",
		"margin-top":-posY+"px"
		

	})

})

/*==========================================
=            CONTADOR DE VISTAS            =
==========================================*/

var contador = 0;

$(window).on("load",function(){

	var vistas = $("span.vistas").html();

	contador = Number(vistas) + 1;

	var item = "vistas";

	$("span.vistas").html(contador);

	var urlActual = location.pathname;
	var ruta = urlActual.split("/");

	var datos = new FormData();
	datos.append("valor", contador);
	datos.append("item", item);
	datos.append("ruta", ruta.pop());

	$.ajax({

		url:rutaOculta+"ajax/producto.ajax.php",
		method:"POST",
		data:datos,
		cache:false,
		contentType: false,
		processData:false,
		succes: function(respuesta){}

	});

})