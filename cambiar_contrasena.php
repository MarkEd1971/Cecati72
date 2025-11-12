<?php
require ('./conexion_db_cecati/conexion_cecati.php');
 $usuario = ($_REQUEST['us']);
 $uss = ($_REQUEST['token']);
 $estado = ($_REQUEST['status']);

if($estado == 'false'){
    $errores .='<li>Las contraseñas no coinciden.</li>';
}else{
    if($estado == 'true'){
    $confirmacion .= '<li>Se ha cambiado la contraseña correctamente.</li>';
    $confirmacion .= '<li>Serás redireccionado para poder ingresar.</li>';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=index.php"></META>';
    }
}
 $user = hash('sha512',$uss);

if($user == $usuario){

}else
{
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=index.php"></META>';
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cecati 72 - Recuperación</title>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Encuesta de satisfacción.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfcOoLfZKjlTgKFLJpEgChov_7gQc-cF6iUiAI0bN5IOR8eEQ/viewform?embedded=true" width="480" height="640" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
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
           echo ' <li class="shake-slow"><a href="administrador.php"> <span class="icon-user"></span>&nbsp;'. $nombre_s_u.'&nbsp;'.$apellido_us.'</a></li>
                <li class="shake-slow"><a href="salir.php"><span class="icon-user-minus"></span>Salir</a></li>';
            }
            ?>
        <!--    <li><a href="registro.php">Registrarse</a></li>-->
        </ul>
      </nav>
    </div>
  </header>
  <main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Recuperación</h2>
      </div>
    </div>
    <!--<section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14963.832563233076!2d-94.59770136996427!3d17.997540714341188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd39b23f3806f248e!2sCECATI%2072!5e0!3m2!1ses-419!2sus!4v1596833121709!5m2!1ses-419!2sus" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Dirección:</h4>
                <p>Ave. Jesús Reyes Heroles S/N, Col. Martín Lancero, Cosoleacaque, Ver.</p>
              </div>
              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Correo:</h4>
                <p>cecati72.dir@dgcft.sems.gob.mx</p>
              </div>
              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Teléfonos:</h4>
                <p>9222210383 y 9222213057</p>
              </div>
<div class="phone">
        <a href="https://www.facebook.com/cecati72.cosoleacaque" class="facebook"><i class="bx bxl-facebook"></i></a>
    <h4>Facebook</h4>
    <p>cecati72</p>
        </div>
                <div class="phone">
        <a href="https://www.instagram.com/cecati72.vin/" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <h4>Instagram</h4>
                    <p>cecati72.vin</p>
                </div>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">
              <section>
              <h3>Tu opinión es muy importante para nosotros, <br>
                  gracias por contestar nuestra <a href="#"  data-toggle="modal" data-target="#exampleModal"> encuesta de satisfacción.</a></h3>
              </section>
          </div>
        </div>
      </div>
    </section>-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Recuperar contraseña</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class=" row justify-content-center">
            <center>
							<div class="col-xs-20">
                                <br>
                                <br>
								<form id="login-form"  method="GET" role="form" name="login" action="procesa_cambio.php" style="display: block;">
									<!--<div class="form-group">
										<input type="text" name="userlogin" id="usuerlogin" tabindex="1" class="form-control" placeholder="Usuario" value="">
									</div>-->
									<div class="form-group">
										<input type="password" name="pwlogin" id="pwlogin" tabindex="2" class="form-control" placeholder="Nueva contraseña">
									</div>
                                    <div class="form-group">
										<input type="password" name="pwlogin2" id="pwlogin2" tabindex="2" class="form-control" placeholder="Repite contraseña">
									</div>
                                    <div class="form-group">
										<input type="hidden" name="a" id="a" tabindex="2" class="form-control" placeholder="a" value="<?php echo $uss ;?>">
									</div>
									<!--<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>-->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-success"  onclick="login.submit" value="Guardar">
											</div>
                                            
										</div>
									</div>
                                            <br>
                                            
                                            <br>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
												</div>
											</div>
										</div>
									</div>
                                    
								</form>
                </div> </center></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
  </main>
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
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
    <script>
   $(document).ready(function()
   {
      $("#myModal").modal("show");
   });
</script>
</body>
</html>