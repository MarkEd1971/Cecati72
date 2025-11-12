<?php session_start();
error_reporting(0);
$sesion1 = $_SESSION['usuario']['t_u'];
$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cecati 72 - MANTENIMIENTO ELECTROMECÁNICO DEL AUTOMÓVIL</title>
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
  <link href="assets/css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="./css/fonts.css">

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
              <li><a href="aplicacion_de_normas_y_procedimientos_contables_y_fiscales.php">Aplicación de Normas y Procedimientos Contables y Fiscales</a></li>
              <li><a href="elaboracion_de_dibujos_arquitectonico_e_industrial.php">Elaboracion de Dibujos Arquitectónico e Industrial</a></li>
              <li><a href="soporte_a_instalaciones_electricas_y_motores_electricos.php">Soporte a Instalaciónes Eléctricas y Motores Eléctricos</a></li>
              <li><a href="mantenimiento_a_equipos_y_sistemas_electronicos.php">Mantenimiento a Equipos y Sistemas Electrónicos</a></li>
              <li><a href="ofimatica.php">Ofimática</a></li>
              <li><a href="uso_de_la_lengua_inglesa_en_diversos_contextos.php">Uso de la Lengua Inglesa en Diversos Contextos</a></li>
              <li><a href="mantenimiento_electromecanico_del_automovil.php">Mantenimiento Electromecánico del Automóvil</a></li>
              <li><a href="electronica_automotriz.php">Mantenimiento al Sistema Electrónico Automotriz</a></li>
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
               echo '<li><a href="index.php?login=1">Administrador</a></li>';
            }else{
           echo ' <li class="shake-slow"><a href="administrador.php"> <span class="icon-user"></span>&nbsp;'. $nombre_s_u.'&nbsp;'.$apellido_us.'</a></li>
                <li class="shake-slow"><a href="salir.php"><span class="icon-user-minus"></span>Salir</a></li>';
            }
            ?>
        <!--    <li><a href="registro.php">Registrarse</a></li>-->
        </ul>
      </nav>
    </div>
  </header>
  <section id="hero_motor" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        <center><h1 style="color: white"><strong>MANTENIMIENTO ELECTROMECÁNICO DEL AUTOMÓVIL</strong></h1></center>
    </div>
  </section>
    <div class="breadcrumbs">
      <div class="container" style="text-align: justify">
       <h3>Reparación de motores a gasolina.</h3>
          <p><strong>Realizar las reparaciones menores y mayores, de motores a gasolina, basándose en las normas establecidas en los manuales de reparación correspondientes, con los componentes, herramientas y equipo adecuados, cumpliendo con las normas de seguridad e higiene y protección al ambiente, logrando así un servicio de calidad.</strong></p>
      </div>
    </div>
      <div class="breadcrumbs1">
      <div class="container" style="text-align: justify">
       <h3>Servicio y reparación al sistema de dirección.</h3>
          <p><strong>Realizar el servicio y/o reparación al sistema de dirección de acuerdo a los lineamientos establecidos y el uso de herramientas y equipo correspondiente, así como el cumplimiento de las medidas de seguridad e higiene y protección ambiental, logrando un servicio de calidad.</strong></p>
      </div>
    </div>
    <div class="breadcrumbs">
      <div class="container" style="text-align: justify">
       <h3>Reparación del sistema de frenos básicos.</h3>
          <p><strong>Realizar el servicio de mantenimiento de frenos básicos preparando, diagnosticando, reparando y verificando los componentes de los sistemas con base en las especificaciones técnicas y los procedimientos de operación, siguiendo los lineamientos de ecología, seguridad e higiene para dar un servicio de calidad.</strong></p>
      </div>
    </div>
    <div class="breadcrumbs1">
      <div class="container" style="text-align: justify">
       <h3>Sistema eléctrico.</h3>
          <p><strong>Diagnosticar el sistema eléctrico del vehículo, detectando sus fallas, proporcionándole el servicio de mantenimiento preventivo y correctivo y reparando los subsistemas asociados, con base en las especificaciones de los fabricantes, lineamientos organizacionales de la empresa y en apego a los procedimientos de seguridad e higiene correspondientes, para prestar un servicio de calidad al cliente.</strong></p>
      </div>
    </div>
    <div class="breadcrumbs">
        <div class="container" style="text-align: justify">
            <h3>Afinación de motores a gasolina con sistema de inyección de combustible.</h3>
            <p><strong>Realizar la afinación de motor a gasolina con sistema de inyección, siguiendo los procedimientos técnicos y el uso del equipo de diagnóstico, instrumentos de medición y herramientas, además verificará que el funcionamiento de los componentes se encuentre dentro de los parámetros establecidos por el fabricante; aplicando las medidas de seguridad e higiene para lograr un servicio de calidad.</strong></p>
        </div>
    </div>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
 <center><br><br><h1>INFÓRMATE, SOBRE LOS <a href="index.php">CURSOS PROGRAMADOS</a> DE LA ESPECIALIDAD,</h1>
            <h1>EN ESTE PERIODO O <a href="contact.php">CONTÁCTANOS</a> PARA UNA ATENCIÓN PERSONALIZADA</h1>
     <br>
     <br>
     <br>
            </center>
          <div class="col-lg col-md-6 footer-contact">
            <p>
              Ave. Jesús Reyes Heroles S/N, Col. Martín Lancero, Cosoleacaque, Ver.
              <strong>Teléfono:</strong> 9222210383 y 9222213057<br>
              <strong>Email:</strong> cecati72.dir@dgcft.sems.gob.mx<br>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="credits">
            <p style="color: white">Creado por Abraham Torres 2020</p>          
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.facebook.com/cecati72.cosoleacaque" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/cecati72.vin/" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
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