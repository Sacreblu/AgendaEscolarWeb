

		<!-- Overlay for fixed sidebar -->
		<nav id="mBar" role="navigation" class="navbar navbar-default navbar-fixed-top">
			<div id="mBar" class="container">
				<div id="mBar" class="navbar-header">
					<button type="button" onclick="openMenu()" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<img class="imgMenu" src="../Complementos/Imagenes/students.png" width="45" height="45">
					<a id="tituloSystem" href="../HTML/Inicio.php" class="navbar-brand">
						Studium College
					</a>
				</div>
			</div>
		</nav>
		<div class="sidebar-overlay"></div>
		<!-- Material sidebar -->
		<aside id="sidebar" class="sidebar sidebar-fixed-left" role="navigation">
			<!-- Sidebar header -->
			<div class="sidebar-header header-cover" style="background-image: url(../Complementos/Imagenes/Cabecera.jpg);">
			<?php
				$query = 'SELECT Nombre, Apellidos, FotoPerfil FROM usuarios WHERE NombreUsuario="'.$username.'"';
                $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
                $row = mysqli_fetch_assoc($result);
                echo '
				<div class="sidebar-image">
					<img src="..'.$row['FotoPerfil'].'">
				</div>

				<a data-toggle="dropdown" class="sidebar-brand">
					<p id="UserName">'.$row['Nombre'].' '.$row['Apellidos'].'</p>
				</a>
                ';
			?>			
			</div>

			<!-- Sidebar navigation -->
			<ul id="men" class="nav sidebar-nav">
				<li>
					<a class="opc" href="../HTML/Inicio.php">
						<img id="iconno" src="../Complementos/Imagenes/Home.png">
						<!--<i class="sidebar-icon md-inbox"></i>-->
						Inicio
					</a>
				</li>
				<li>
					<a class="opc" href="../HTML/Perfil.php">
						<img id="iconno" src="../Complementos/Imagenes/Perfil.png">
						Perfil
					</a>
				</li>
				<li>
					<a class="opc" href="../HTML/Contactos.php">
						<img id="iconno" src="../Complementos/Imagenes/Contactos.png">
						Contactos
					</a>
				</li>
				<li>
					<a class="opc" href="#">
						<img id="iconno" src="../Complementos/Imagenes/Nota.png">
						<!--<i class="sidebar-icon md-inbox"></i>-->
						+ Actividad
					</a>
				</li>

					<li class="divider"></li>

				<li id="opc" class="dropdown">
					<p class="subt">Tareas</p>
					<a class="ripple-effect dropdown-toggle" id="opc" data-toggle="dropdown">
						Individuales
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#" tabindex="-1">
								Pendientes
								<span class="sidebar-badge">12</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Realizados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Caducados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
					</ul>
				</li>
				<li id="opc" class="dropdown">
					<a class="ripple-effect dropdown-toggle" id="opc" data-toggle="dropdown">
						Grupal
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#" tabindex="-1">
								Pendientes
								<span class="sidebar-badge">12</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Realizados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Caducados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="dropdown">
					<p class="subt">Proyectos</p>
					<a class="ripple-effect dropdown-toggle" id="opc" data-toggle="dropdown">
						Individuales
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#" tabindex="-1">
								Pendientes
								<span class="sidebar-badge">12</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Realizados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Caducados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="ripple-effect dropdown-toggle" id="opc" data-toggle="dropdown">
						Grupal
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#" tabindex="-1">
								Pendientes
								<span class="sidebar-badge">12</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Realizados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
						<li>
							<a href="#" tabindex="-1">
								Caducados
								<span class="sidebar-badge">0</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="divider"></li>
				<li>
					<a class="opc" href="../PHP/CerrarSesion.php">
						<img id="iconno" src="../Complementos/Imagenes/Logout.png">
						<!--<i class="sidebar-icon md-inbox"></i>-->
						Cerrar Sesión
					</a>
				</li>
			</ul>
		</aside>

		<script type="text/javascript">

// Sidebar toggle----------------


function openMenu(){

	$(document).ready(function(){
		var overlay = $('.sidebar-overlay');

		$(function (){
			var sidebar = $('#sidebar');
			sidebar.toggleClass('open');
			if((sidebar.hasClass('sidebar-fixed-left') || sidebar.hasClass('sidebar-fixed-right')) && sidebar.hasClass('close')){
				overlay.addClass('active');
			}else{
				overlay.removeClass('active');
			}
		});

		overlay.on('click', function() {
        	$(this).removeClass('active');
        	$('#sidebar').removeClass('open');
    	});
	});


	$(document).ready(function() {
    	var sidebar = $('#sidebar');
    	var sidebarHeader = $('#sidebar .sidebar-header');
    	var sidebarImg = sidebarHeader.css('background-image');
    	var toggleButtons = $('.sidebar-toggle');

    	toggleButtons.css('display', 'none');

    	// Sidebar position
    	$(function() {
    		var value = "sidebar-fixed-left";
    		sidebar.addClass('open');
    		if (value == 'sidebar-fixed-left' || value == 'sidebar-fixed-right') {
    			$('.sidebar-overlay').addClass('active');
    		}
        	// Show toggle buttons
        	if (value != '') {
        		toggleButtons.css('display', 'initial');
        	} else {
            	// Hide toggle buttons
            	toggleButtons.css('display', 'none');
        	}
    	});

    	// Sidebar theme
    	$(function() {
    		var value = "sidebar-colored";
    		sidebar.removeClass('sidebar-default sidebar-inverse sidebar-colored sidebar-colored-inverse').addClass(value)
    	});

    // Header cover
    $(function() {
    	var value = "header-cover";

    	$('.sidebar-header').removeClass('header-cover').addClass(value);

    	if (value == 'header-cover') {
    		sidebarHeader.css('background-image', sidebarImg)
    	} else {
    		sidebarHeader.css('background-image', '')
    	}
    });

	});


}

(function($) {
    var dropdown = $('.dropdown');

    // Add slidedown animation to dropdown
    dropdown.on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideup animation to dropdown
    dropdown.on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
})(jQuery);



(function(removeClass) {

    jQuery.fn.removeClass = function( value ) {
		if ( value && typeof value.test === "function" ) {
			for ( var i = 0, l = this.length; i < l; i++ ) {
				var elem = this[i];
				if ( elem.nodeType === 1 && elem.className ) {
					var classNames = elem.className.split( /\s+/ );

					for ( var n = classNames.length; n--; ) {
						if ( value.test(classNames[n]) ) {
							classNames.splice(n, 1);
						}
					}
					elem.className = jQuery.trim( classNames.join(" ") );
				}
			}
		} else {
			removeClass.call(this, value);
		}
		return this;
	}

})(jQuery.fn.removeClass);
		</script>