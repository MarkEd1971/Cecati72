<?php session_start();
error_reporting(0);
$sesion1 = $_SESSION['usuario']['t_u'];
if($sesion1 == ''){
header('Location: index.php');
}

$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];
require ('./conexion_db_cecati/conexion_cecati.php');
$cv_curso1 = ($_REQUEST['cv']);
$cv_curso2 = ($_REQUEST['cv2']);

$consulta_precio = "SELECT * FROM precios";
        $ejecutar_precio = $mysqli->query($consulta_precio);
$r_precio = $ejecutar_precio->fetch_assoc();
          $n_precio = $r_precio['inscripcion'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nuevo_precio = filter_var($_POST['nuevo_precio'],FILTER_SANITIZE_STRING);
    
     mysqli_query ($mysqli, "UPDATE precios set inscripcion = '$nuevo_precio' WHERE id = '1'") or die ($errores .= '<li>Ha ocurrido un error en el servidor</li>');
         echo '<META HTTP-EQUIV="Refresh" CONTENT="0.1; URL=cambiar_precio_inscripcion.php"></META>';
  /*  $alta_c ="INSERT INTO cursos (id, nombre_c, inicio, termino, precio) VALUES ('$id_curso','$nombre_h','$inicio','$termino','$precio')";
                $alta_c = $mysqli->query($alta_c); */
}
/*$consulta_nc = "SELECT * FROM especialidades WHERE id = $cv_curso1 ";
        $ejecutar_cons = $mysqli->query($consulta_nc);
$r_cons = $ejecutar_cons->fetch_assoc();
          $n_curso = $r_cons['nombre_e'];*/

/*if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_curso = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
    $nombre_h = filter_var($_POST['nombre_h'],FILTER_SANITIZE_STRING);
    $inicio = filter_var($_POST['inicio'],FILTER_SANITIZE_STRING);
    $termino = filter_var($_POST['termino'],FILTER_SANITIZE_STRING);
    $precio = filter_var($_POST['precio'],FILTER_SANITIZE_STRING);
    
    $alta_c ="INSERT INTO cursos (id, nombre_c, inicio, termino, precio) VALUES ('$id_curso','$nombre_h','$inicio','$termino','$precio')";
                $alta_c = $mysqli->query($alta_c); 
}*/

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cecati 72 - ADMINISTRADOR</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <meta name="google-site-verification" content="SVZZmiBb3Z3AN6nWMzo5Ljbb8zWo039G8uzPNZxebKk" />
  <link href="./assets/img/Imagenes/otros/Logos_Cecati/logo_cecati_v2.png" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet"> 
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/fonts.css">
    <script src="js/jquery-3.3.1.min.js"></script>
  <link href="assets/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['ADMINISTRACIÓN',     <?php echo $r_cons_admin ;?>],
          ['ASISTENCIA EJECUTIVA',  <?php echo $r_cons_asis ;?>],
          ['APLICACIÓN DE NORMAS Y PROCEDIMIENTOS CONTABLES', <?php echo $r_cons_apli ;?>],
          ['ELABORACIÓN DE DIBUJOS ARQUITECTÓNICOS E INDUSTRIAL', <?php echo $r_cons_dibujo ;?>],
          ['SOPORTE A INSTALACIÓNES ELÉCTRICAS Y MOTORES ELÉCTRICOS', <?php echo $r_cons_soporte_e ;?>],
          ['MANTENIMIENTO A EQUIPOS Y SISTEMAS ELECTRÓNICOS', <?php echo $r_cons_mantenimiento_e ;?>],
          ['OFIMÁTICA', <?php echo $r_cons_ofi ;?>],
          ['USO DE LA LENGUA INGLESA EN DIVERSOS CONTEXTOS', <?php echo $r_cons_ingles ;?>],
          ['MANTENIMIENTO ELECTROMECÁNICO DEL AUTOMÓVIL', <?php echo $r_cons_auto ;?>],
          ['ELECTROMECÁNICA AUTOMOTRIZ', <?php echo $r_cons_electro ;?>],
          ['REFRIGERACIÓN Y AIRE ACONDICIONADO', <?php echo $r_cons_aire ;?>]
        ]);

        var options = {
          title: 'Inscritos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto" style="color: black"><img src="./assets/img/Imagenes/otros/Logos_Cecati/logo_cecati_v2.png" alt="" class="img-fluid"><a href="index.php">Cecati 72</a></h1>
    <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="quienes_somos.php">¿Quienes somos?</a></li>
            <li class="drop-down"><a href="#">Servicios</a>
            <ul>
              <li><a href="examen_roco.php">Examen ROCO</a></li>
              <li><a href="acciones_moviles.php">Acciones móviles</a></li>
              <li><a href="cursos_cae.php">Cursos CAE</a></li>
              <li><a href="centro_emprendedor.php">Centro Emprendedor</a></li>
              <li><a href="bolsa_de_trabajo.php">Bolsa de Trabajo</a></li>
            </ul>
          </li>
           <li class="drop-down"><a href="#">Especialidades</a>
            <ul>
              <li><a href="administracion.php">Administración</a></li>
              <li><a href="asistencia_ejecutiva.php">Asistencia Ejecutiva</a></li>
              <li><a href="aplicacion_de_normas_y_procedimientos_contables_y_fiscales.php">Aplicación De Normas y Procedimientos Contables</a></li>
              <li><a href="elaboracion_de_dibujos_arquitectonico_e_industrial.php">Elaboracion de Dibujos Arquitectónicos e Industrial</a></li>
              <li><a href="soporte_a_instalaciones_electricas_y_motores_electricos.php">Soporte a Instalaciónes Eléctricas y Motores Eléctricos</a></li>
              <li><a href="mantenimiento_a_equipos_y_sistemas_electronicos.php">Mantenimiento a Equipos y Sistemas Electrónicos</a></li>
              <li><a href="ofimatica.php">Ofimática</a></li>
              <li><a href="uso_de_la_lengua_inglesa_en_diversos_contextos.php">Uso de la Lengua Inglesa en Diversos Contextos</a></li>
              <li><a href="mantenimiento_electromecanico_del_automovil.php">Mantenimiento Electromecánico del Automóvil</a></li>
              <li><a href="electronica_automotriz.php">Electrónica Automotriz</a></li>
              <li><a href="refrigeracion_y_aire_acondicionado.php">Refrigeración y Aire Acondicionado</a></li>
            </ul>
          </li>
          <!--<li><a href="index.php?ask=1">Inscripciones</a></li>-->
           <li><a href="https://forms.gle/CSB7ZX7EWEjdeCBYA">Inscripciones</a></li>
          <li><a href="contact.php">Contacto</a></li>
            
            <!--li class="drop-down"><a href="#">Inscripciones</a>
            <ul>
            <!--  <li><a href="index.php?ask=1">Clases en línea</a></li>-->
              <!--li><a href="index.php?p_correo2=1">Becas</a></li>
            </ul>
           </li>

            <?php
             if($sesion1 == ''){
               echo '<li><a href="index.php?login=1">Ingresar</a></li>';
            }else{
           echo ' <li class="drop-down"><a href="administrador.php"> <span class="icon-user"></span>&nbsp;'. $nombre_s_u.'&nbsp;'.$apellido_us.'</a>
            <ul>
            <!--  <li><a href="index.php?ask=1">Clases en línea</a></li>-->
              <li><a href="cambiar_banner.php">Cambiar baners</a></li>
              <li><a href="cambiar_precio_inscripcion.php">Cambiar precio inscripcion</a></li>      
              <li><a href="cambiar_precio_reinscripcion.php">Cambiar precio reincripción</a></li>
              <li><a href="cambiar_precio_cosoleacaque.php">Cambiar precio beca coloseacaque</a></li>

            </ul>
          </li> 
          <!-- <li class="shake-slow"><a href="administrador.php"> <span class="icon-user"></span>&nbsp;'. $nombre_s_u.'&nbsp;'.$apellido_us.'</a></li>-->
                <li class="shake-slow"><a href="salir.php"><span class="icon-user-minus"></span>Salir</a></li>';
            }
            ?>
        </ul>
      </nav>
    </div>
  </header>
  <main id="main"><br><br>
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Cambiar precio de inscripción (General).</h2>
        <p></p>
      </div>
    </div>
       <div align="right"> <form action="busqueda.php" method="get" class="form_search">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
                    <input type="submit" value="Buscar" class="btn btn-primary">
        </form> <br>
           <h4>Descargar reporte general <a class="link_delete" href="reporte_excel.php"><span class="icon-download" ></span></a>&nbsp;&nbsp;&nbsp;</h4>
           <h4>Descargar reporte general de becarios <a class="link_delete" href="reporte_excel_becarios.php"><span class="icon-download" ></span></a>&nbsp;&nbsp;&nbsp;</h4>
           <br>
           <h3><strong> Precio general actual: $ <?php echo $n_precio; ?>&nbsp;&nbsp;&nbsp; </strong> </h3>
      </div>
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
          <div class="col-xs-20">
                                
								<form id="login-form"  method="POST" role="form" name="precio_ins" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
									<div class="form-group col-md-20">
										<input type="text" name="nuevo_precio" id="nuevo_precio" tabindex="1" class="form-control" placeholder="Introduce el precio. Ejemp. 200.00" value="" required>
									</div>
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-success"  onclick="login.submit" value="Guardar">
											</div>
                                            
										</div>
                                        <br>
                                       
									</div>
                                         
									<div class="form-group">
										<div class="row">
											<div class="col-lg-6">
												<div class="text-center">
												</div>
											</div>
										</div>
									</div>
                                    
								</form>
                </div>
        
      </div>
    </section>
   
  </main>
  <footer id="footer">
    
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="credits">
            <p>
              Ave. Jesús Reyes Heroles S/N, Col. Martín Lancero, Cosoleacaque, Ver.
              <strong>Teléfono:</strong> 9222210383 y 9222213057<br>
              <strong>Email:</strong> cecati72.dir@dgcft.sems.gob.mx<br>
            </p>
            <br>
            <p style="color: white">Creado por Abraham Torres 2020</p>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.facebook.com/cecati72.cosoleacaque" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/cecati72.vin/" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer>
¡  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>