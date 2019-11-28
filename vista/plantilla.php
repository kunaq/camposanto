<?php
//session_start();
$_SESSION['captcha'] = simple_php_captcha();
?>
<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Sistema de Gestión de Camposanto
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Pragma" content="no-cache">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
          window.onload=Loaded; 
          function Loaded(){
			 $(".loader").fadeOut("slow");
			}
        </script>
    	<link href="vista/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    	<!--end::Page Vendors -->
    	<link href="vista/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    	<link href="vista/assets/demo/demo3/base/style.bundle.css" rel="stylesheet" type="text/css" />
    	<!--end::Base Styles -->
    	<link rel="shortcut icon" href="vista/img/logo_fe_gQ5_icon.ico" />
    	<!-- DataTables -->
    		<link rel="stylesheet" href="vista/assets/vendors/custom/datatables.net-bs/css/dataTables.bootstrap.min.css">
    		<link rel="stylesheet" href="vista/assets/vendors/custom/datatables.net-bs/css/responsive.bootstrap.min.css">
    	<link rel="stylesheet" href="vista/assets/vendors/custom/jquery.dataTables.min.css" > 

	</head>
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="loader"></div>
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->

			<?php

			if(isset($_SESSION["user"])){


				if($_GET["ruta"] == "login"){

					echo '<body  class="m--skin-dark m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >';
					include("modulos/".$_GET["ruta"].".php");

				}else{

					include("modulos/cabezote.php");
					include("modulos/menu1.php");
					echo '<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="background-color:lightgray;">';

					if(isset($_GET["ruta"])){

		        		if(	$_GET["ruta"] == "listaservicios" ||
		        			$_GET["ruta"] == "inicio2" ||
		        			$_GET["ruta"] == "genContrato2" ||
		        			$_GET["ruta"] == "genContrato" ||
		        			$_GET["ruta"] == "wizard" ||
		        			$_GET["ruta"] == "wizard--" ||
		        			$_GET["ruta"] == "periodo-venta" ||
		        			$_GET["ruta"] == "listadoContrato" ||
		        			$_GET["ruta"] == "arbol-vendedores" ||
		        			$_GET["ruta"] == "listado-prospectos" ||
		        			$_GET["ruta"] == "registro-prospecto" ||
		        			$_GET["ruta"] == "comisiones" ||
		        			$_GET["ruta"] == "registroReportes" ||
		        			$_GET["ruta"] == 'modificacionContrato' ||
		        			$_GET["ruta"] == "seguimientoContrato" ||
		        			$_GET["ruta"] == "cambioTitular" ||
		        			$_GET["ruta"] == "refinanciamiento" ||
		        			$_GET["ruta"] == 'mapaEspacios' ||
		        			$_GET["ruta"] == 'resolucionContrato' ||
		        			$_GET["ruta"] == 'usoServicios'){

		           		   	include "modulos/".$_GET["ruta"].".php";

		           		}else{

		           			include "modulos/inicio2.php";

		           		}

		           	}else{

		           		include "modulos/inicio2.php";

		           	}
                    
		           	include("modulos/footer.php");

				}
			}
			else{
				if($_GET["ruta"] == "login" || $_GET["ruta"] == ""){
					echo '<body  class="m--skin-dark m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >';
					include("modulos/login.php");
				}
				else{
					echo '<body  class="m--skin-dark m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >';
					include("modulos/notFound.php");
				}
			}

			?>
				
			</div>
		</div>
		<!-- end:: Page -->
    		        <!-- begin::Quick Sidebar -->
		<!-- end::Quick Sidebar -->		    
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- begin::Quick Nav -->	
    	<!--begin::Base Scripts -->
    	<script  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="vista/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="vista/assets/demo/demo3/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="vista/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<script src="vista/assets/vendors/custom/fullcalendar/es.js" type="text/javascript"></script>
		<script src="vista/assets/app/js/dashboard.js" type="text/javascript"></script>
		<script src="vista/js/select2.js" type="text/javascript"></script>
		<script src="vista/js/html-table.js" type="text/javascript"></script>
		<script src="vista/js/data-local.js" type="text/javascript"></script>
		<script src="vista/js/sweetalert2.js" type="text/javascript"></script>
        <script src="vista/js/extensiones.js" type="text/javascript"></script>
        <script src="vista/js/visorServicios.js" type="text/javascript"></script>
        <script src="vista/plugins/jqueryNumber/jquery.number.js" type="text/javascript"></script>
		<!-- DataTables -->
    	<script src="vista/assets/vendors/custom/datatables.net/js/jquery.dataTables.min.js"></script>
    	<script src="vista/assets/vendors/custom/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    	<script src="vista/assets/vendors/custom/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    	<script src="vista/assets/vendors/custom/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    	<!--datepicker-->
    	<script src="vista/assets/vendors/custom/bootstrap-datepicker.js" type="text/javascript"></script>
    	<script src="vista/assets/vendors/custom/bootstrap-datetimepicker.js" type="text/javascript"></script>
    	<script src="vista/assets/demo/demo3/base/typeahead.js" type="text/javascript"></script>
    	<script src="vista/js/login.js" type="text/javascript"></script>
    	<script src="vista/js/lafuncion.js" type="text/javascript"></script>
    	<?php
        if(isset($_GET["ruta"])){
            if($_GET["ruta"] == 'wizard' ||
        		$_GET["ruta"] == 'periodo-venta' ||
        		$_GET["ruta"] == 'arbol-vendedores' ||
        		$_GET["ruta"] == 'listadoContrato' ||
        		$_GET["ruta"] == 'listado-prospectos' ||
        		$_GET["ruta"] == 'registro-prospecto' ||
        		$_GET["ruta"] == 'comisiones' ||
        		$_GET["ruta"] == 'registroReportes' ||
        		$_GET["ruta"] == 'modificacionContrato' ||
        	    $_GET["ruta"] == 'cambioTitular' ||
        	    $_GET["ruta"] == 'refinanciamiento' ||
         	    $_GET["ruta"] == 'mapaEspacios' ||
        	    $_GET["ruta"] == 'resolucionContrato' ||
        	    $_GET["ruta"] == 'seguimientoContrato' ||
        	    $_GET["ruta"] == 'usoServicios'){  
                echo '<script type="text/javascript" src="vista/js/'.$_GET["ruta"].'.js"></script>';
            }
        }
        ?>

    </body>
</html>