<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Ingreso al sistema</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style type="text/css">
			body
			{
				margin: 0px;
				padding: 0px;
				background: #e74c3c;
				font-family: 'Lato', sans-serif;
			}
			h1
			{
				margin: 2em 0px;
				padding: 0px;
				color: #fff;
				text-align: center;
				font-weight: 100;
				font-size: 50px;
			}
			nav
			{
				width: 100%;
				margin: 1em auto;
				text-align: center;
			}
			.clase
			{
				position: absolute;
				/*nos posicionamos en el centro del navegador*/
				top:50%;
				left:30%;
				/*determinamos una anchura*/
				width:100%;
				/*indicamos que el margen izquierdo, es la mitad de la anchura*/
				margin-left:-200px;
				/*determinamos una altura*/
				/*indicamos que el margen superior, es la mitad de la altura*/
				margin-top:-150px;
			}
			ul
			{
				margin: 0px;
				padding: 0px;
				list-style: none;
			}
			ul.dropdown
			{ 
				position: relative; 
				width: 100%; 
			}
			ul.dropdown li
			{ 
				font-weight: bold; 
				float: left; 
				width: 180px; 
				position: relative;
				background: #ecf0f1;
			}
			ul.dropdown a:hover
			{		
				color: #000; 
			}
			ul.dropdown li a 
			{ 
				display: block; 
				padding: 20px 8px;
				color: #34495e; 
				position: relative; 
				z-index: 2000; 
				text-align: center;
				text-decoration: none;
				font-weight: 300;
			}
			ul.dropdown li a:hover,
			ul.dropdown li a.hover
			{ 
				background: #3498db;
				position: relative;
				color: #fff;
			}
			ul.dropdown ul
			{ 
				display: none;
				position: absolute; 
				top: 0; 
				left: 0; 
				width: 180px; 
				z-index: 1000;
			}
			ul.dropdown ul li 
			{ 
				font-weight: normal; 
				background: #f6f6f6; 
				color: #000; 
				border-bottom: 1px solid #ccc; 
			}
			ul.dropdown ul li a
			{ 
				display: block; 
				color: #34495e !important;
				background: #eee !important;
			} 
			ul.dropdown ul li a:hover
			{
				display: block; 
				background: #3498db !important;
				color: #fff !important;
			} 
			.drop > a
			{
				position: relative;
			}
			.drop > a:after
			{
				content:"";
				position: absolute;
				right: 10px;
				top: 40%;
				border-left: 5px solid transparent;
				border-top: 5px solid #333;
				border-right: 5px solid transparent;
				z-index: 999;
			}
			.drop > a:hover:after
			{
				content:"";
				border-left: 5px solid transparent;
				border-top: 5px solid #fff;
				border-right: 5px solid transparent;
			}
		</style>
		<script>
			var maxHeight = 1000;
			$(document).ready(function()
			{
    			$(".dropdown > li").hover(function() 
    			{
         			var $container = $(this),
             		$list = $container.find("ul"),
             		$anchor = $container.find("a"),
             		height = $list.height() * 1.1,       // make sure there is enough room at the bottom
             		multiplier = height / maxHeight;     // needs to move faster if list is taller
        			// need to save height here so it can revert on mouseout            
        			$container.data("origHeight", $container.height());        
        			// so it can retain it's rollover color all the while the dropdown is open
        			$anchor.addClass("hover");
        			// make sure dropdown appears directly below parent list item    
        			$list
            		.show()
            		.css({
                		paddingTop: $container.data("origHeight")
            		});
        			// don't do any animation if list shorter than max
        			if (multiplier > 1) 
        			{
            			$container
                	.css({
                    	height: maxHeight,
                    	overflow: "hidden"
                	})
                	.mousemove(function(e) 
                	{
                    	var offset = $container.offset();
                    	var relativeY = ((e.pageY - offset.top) * multiplier) - ($container.data("origHeight") * multiplier);
                    	if (relativeY > $container.data("origHeight")) 
                    	{
                        	$list.css("top", -relativeY + $container.data("origHeight"));
                    	};
                	});
        }
        
    }, function() {
    
        var $el = $(this);
        
        // put things back to normal
        $el
            .height($(this).data("origHeight"))
            .find("ul")
            .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
    
    });  
    
});
</script>
</head>
<body>

<div class="clase">
	<nav>
		<ul class="dropdown">
	    	<li class="drop"><a href="#">Cliente</a>
	    		<ul class="sub_menu">
							<li><a href="Admin">Seleccion De Viaje</a></li>
							<!-- <li><a href="#">Reserva</a></li>
							<li><a href="#">Compra</a></li> -->
	    		</ul>
	    	</li>
	    	<li class="drop"><a href="#">Taquilla</a>
	    		<ul class="sub_menu">
	    			<li><a href="#">Tiquetes Recervados</a></li>
					<li><a href="#">Tiquetes Comprados</a></li>
					<li><a href="#">Destinos</a></li>		
	    		</ul>
	    	</li>
	    	<li class="drop"><a href="#">Administrador De Servicios</a>
	    		<ul class="sub_menu">
	    			<li><a href="#">CRUD Tarifas</a></li>
					<li><a href="#">CRUD Viajes</a></li>
	    		</ul>
	    	</li>
			<li class="drop"><a href="#">Administrador Empresas</a>
	    		<ul class="sub_menu">
	    			<li><a href="#">CRUD Usuarios</a></li>
					<li><a href="OrigenDestino">CRUD Origen Y Destino</a></li>
					<li><a href="RegCliente">CRUD Clientes</a></li>
	    		</ul>
	    	</li>
			<li class="drop"><a href="#">Super Usuario</a>
	    		<ul class="sub_menu">
	    			<li><a href="Empresa">CRUD Empresas</a></li>
	    		</ul>
	    	</li>
	    </ul>
	</nav> 

</div>
<div>
	<h1>BUY TICKET</h1>
</div>

</body>
</html>
