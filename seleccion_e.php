<?php session_start();
error_reporting(0);
$sesion1 = $_SESSION['usuario']['t_u'];
$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];
require ('./conexion_db_cecati/conexion_cecati.php');
$cv_curso1 = ($_REQUEST['cv']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario1 = ($_REQUEST['claveh_1']);
$requicitos = ($_REQUEST['info']);
$alum_no = ($_REQUEST['token']);
$errores = '';
$confirmacion = '';


$n_curso = "SELECT * FROM cursos where id = $cv_curso1  ";
        $ejecutar1 = $mysqli->query($n_curso);
                   // $ejecutar2 = $mysqli->query($consulta_list_previa);
       // $row_cnt = $ejecutar->num_rows;
        
    

if($cv_curso1 >= 1){
 $errores .= '<div "table-responsive">
            <table class="table table-striped">
            <thead>
            <th>Nombre </th>
            <th>Periodo</ht>
            <!--<th>Término</th>-->
            <th>Precio</th>
            </thead>
            <tbody>
            ';
                //$n = 0;
                while($filas1 = $ejecutar1->fetch_row()){
                  //  $id= $filas[0];
                    
                    $errores.='<tr>
                    
                    <td>'.$filas1[2].'</td>
                    <td>'.$filas1[4].'<br>'.$filas1[5].'</td>
                    <!--<td>'.$filas1[5].'</td>-->
                    <td>'.$filas1[3].'</td>
                    </tr>';
                } 
            $errores.= "</tbody></table> </div>";
   // $errores.='algo';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cecati 72</title>
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
    
    
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
                      <h4 class="modal-title">Reestablecer contraseña</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div align="center">
          <h3>Por favor, ingrese su correo electronico.</h3>
          <form action="envio_de_correo.php" method="post" id="login-form">
               <div class="form-group">
          <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingrese su correo." value="">
              </div>
                    <input type="submit" value="Enviar" class="btn btn-primary">
                        </form></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar.</button>
        </div>
      </div>
    </div>
  </div>

 <div class="modal fade" id="info" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proceso de Inscripción</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h4 style="color: blue">Requisitos</h4>
          <p>· Tener como mínimo 15 años cumplidos.</p>
          <p>· CURP (PDF)</p>
          <p>· Una foto Selfie de tu rostro</p>
          <p>· Comprobante del pago escaneado ó  foto legible.</p>
         <!-- <p>· Escaner del arancel de pago junto con la ficha de depósito bancario.</p>
          <p>· Foto blanco y negro o a color.</p>
          <p>· CURP (PDF).</p>
          <p>· Acta de nacimiento (Digital en PDF o Escaneado).</p>
          <p>· Escaner del último comprobante de estudios.</p>
          <p>· Escaner del comprobante de domicilio. </p>-->
          <h4 style="color: blue">Paso 1</h4>
     Llenar el formulario de inscripción, se puede acceder al dar clic en "inscribirse" sobre la especialidad de interéz que se encuentra enlistada por debajo de esta ventana emergente.
          <br>
          <h4 style="color: blue">Paso 2</h4>
      Una vez llenado los datos que se solicitan en el formulario, tiene que enviar un correo electronico a: cecati72.dir@dgcft.sems.gob.mx , con los documentos solicitados.
<br>
     <p style="color: red">Nota: los documentos deben ser escaneados.<br>
          El  pago se realiza en una sucursal Banorte, oficina TELECOMM o farmacia Guadalajara.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='inscripciones.php'">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
    
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Ingresar</strong> Administrador (Beta)</h5>
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
								<form id="login-form"  method="POST" role="form" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
									<div class="form-group col-md-20">
										<input type="text" name="userlogin" id="usuerlogin" tabindex="1" class="form-control" placeholder="Correo Electrónico" value="" required>
									</div>
									<div class="form-group col-md-20">
										<input type="password" name="pwlogin" id="pwlogin" tabindex="2" class="form-control" placeholder="Contraseña" required>
									</div>
									<!--<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>-->
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-primary"  onclick="login.submit" value="Entrar">
											</div>
                                            
										</div>
                                        <br>
                                       <strong align="right"><a href="index.php?rec_c=1" style="color:blue">Olvidé mi contraseña</a></strong>
									</div>
                                            <br>
                                    
                                            <!-- <a href="#" style="color:blue" data-toggle="modal" data-target="#exampleModal"> ¿No tienes cuenta? ¡Registrate!</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong align="right"><a data-toggle="modal" data-target="#myModal" style="color:blue">Olvidé mi contraseña</a></strong>-->
                                            
									<div class="form-group">
										<div class="row">
											<div class="col-lg-6">
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
    <div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Registro</strong> Administrador (Beta)</h5>
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
								<form id="login-form"  method="POST" role="form" name="registro" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
									<div class="form-group col-md-20">
										<input type="text" name="nom_u" id="nom_u" tabindex="1" class="form-control" placeholder="Nombre" value="" required>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="nom_u2" id="nom_u2" tabindex="1" class="form-control" placeholder="Segundo nombre (Opcional)" value="">
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="apellido_p" id="apellido_p" tabindex="1" class="form-control" placeholder="Apellido paterno" value="" required>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="apellido_m" id="apellido_m" tabindex="1" class="form-control" placeholder="Apellido materno" value="" required>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="correo" id="correo" tabindex="1" class="form-control" placeholder="Correo" value="" required>
									</div>
									<div class="form-group col-md-20">
										<input type="password" name="pwlogin" id="pwlogin" tabindex="2" class="form-control" placeholder="Contraseña" required>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="spam" id="spam" tabindex="1" class="form-control" placeholder="spam" value="" hidden>
									</div>
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-primary"  onclick="login.submit" value="Registrar">
											</div>
                                            
										</div>
									</div>
                                            <br> 
									<div class="form-group">
										<div class="row">
											<div class="col-lg-6">
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
  <section id="hero_in" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        
       <!-- <center><h1 style="color:red"><strong>Especialidades</strong></h1></center>-->
    </div>
  </section><br>
     <center><h2>Oferta educativa.</h2></center><!--<p style="text-align: right">El proceso de inscripción es de 2 pasos. <a <?php $candado =1; echo 'href="index.php?id='.$candado = hash('sha512',$candado).'
&info=1"' ?> >Saber más.  </a>&nbsp;&nbsp;&nbsp;&nbsp;</p><br>
    <h5><strong style="color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nota:</strong>Para ver los precios y horarios diponibles, seleccione sobre el nombre del curso.</h5>-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
          <?php
    
     $consulta_list_previa = "SELECT * FROM cursos ORDER BY nombre_c ASC ";
        $ejecutar = $mysqli->query($consulta_list_previa);
                   // $ejecutar2 = $mysqli->query($consulta_list_previa);
       // $row_cnt = $ejecutar->num_rows;
            
        echo '
            <div "table-responsive">
            <table class="table table-striped">
            <thead>
           <!-- <th>No. &nbsp; &nbsp;</th>-->
            <th> &nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;</th>
            <th>   </th>
           <!-- <th>Apellido materno &nbsp;</th>
            <th>Carrera</th>-->
            </thead>
            <tbody>
            </div>';
                //$n = 0;
                while($filas = $ejecutar->fetch_row()){
                  //  $id= $filas[0];
                    
                    echo'<tr>
                   <!-- <td>'.$filas[0].'</td>-->
                    <td><!--<a class="link_delete" href="seleccion_e.php?id='.$filas[0] = hash('sha512',$filas[0]).'
&cv='.$filas[0].'&token='.$alum_no.'" style="color:black">'.$filas[2].'</a>--> '.$filas[2].'</td>
                    <td><a class="link_delete" href="seleccion_horario.php?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[1].'&token='.$alum_no.'&clave_c1='.$curso1_s.'&claveh1='.$horario1.'">Inscribirse</a></td>
                   <!-- <td><a class="link_delete" href="inscripciones.php?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[0].'"><span class="icon-user-add" style="color:green"></span>Ver cursos.</a></td>-->
                    <!--<td>$filas[4]</td>
                    <td>$filas[8]</td>-->
                    </tr>';
                } 
            echo "</tbody></table> </div>";
            ?>
           <div class="modal fadebd-example-modal-lg" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
               <h3><?php 
 $consulta_nc1 = "SELECT * FROM especialidades WHERE id = $cv_curso1 ";
        $ejecutar_cons1 = $mysqli->query($consulta_nc1);
$r_cons1 = $ejecutar_cons1->fetch_assoc();
          $n_curso1 = $r_cons1['nombre_e'];echo $n_curso1;?></h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <!-- <h3>Mensaje</h3>-->
           </div>
           <div class="modal-body">
              <?php if(!empty($errores)):?>
                                                <div>
                                                <ul>
                                                    <?php echo '  <script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>'. $errores;?>
                                                    </ul>
                                                </div>
                                                <?php endif; ?>
                                <?php if(!empty($confirmacion)):?>
                                                <div class="alert alert-success">
                                                <ul>
                                                    <?php echo '  <script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>'. $confirmacion;?>
                                                    </ul>
                                                </div>
                                                <?php endif; ?>
                                 <?php if(!empty($advertencia)):?>
                                                <div class="alert alert-warning">
                                                <ul>
                                                    <?php echo '  <script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>'. $advertencia;?>
                                                    </ul>
                                                </div>
                                                <?php endif; ?> 
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proceso de Inscripción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4 style="color: blue">Requisitos</h4>
          <p>· Tener como mínimo 15 años cumplidos.</p>
          <p>· CURP (PDF)</p>
          <p>· Una foto Selfie de tu rostro</p>
          <p>· Comprobante del pago escaneado ó  foto legible.</p>
         <!-- <p>· Escaner del arancel de pago junto con la ficha de depósito bancario.</p>
          <p>· Foto blanco y negro o a color.</p>
          <p>· CURP (PDF).</p>
          <p>· Acta de nacimiento (Digital en PDF o Escaneado).</p>
          <p>· Escaner del último comprobante de estudios.</p>
          <p>· Escaner del comprobante de domicilio. </p>-->
          <h4 style="color: blue">Paso 1</h4>
     Llenar el formulario de inscripción, se puede acceder al dar clic en "inscribirse" sobre la especialidad de interéz que se encuentra enlistada por debajo de esta ventana emergente.
          <br>
          <h4 style="color: blue">Paso 2</h4>
      Una vez llenado los datos que se solicitan en el formulario, tiene que enviar un correo electronico a: cecati72.dir@dgcft.sems.gob.mx , con los documentos solicitados.
<br>
     <p style="color: red">Nota: los documentos deben ser escaneados.<br>
          El  pago se realiza en una sucursal Banorte, oficina TELECOMM o farmacia Guadalajara.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
        <div class="row">
 <center><h1>¡INSCRÍBETE YA!</h1>
            </center>
          <div class="col-lg col-md-6 footer-contact">
          </div>
        </div>
      </div>
    </div>
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
       <div class="modal fade" id="info" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"><strong>¡ATENCIÓN!</strong></h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h2 style="color: blue">Requisitos</h2>
          <h3>· Tener como mínimo 15 años cumplidos.</h3>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
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
    
      <div class="modal fadebd-example-modal-lg" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
             <h3>Mensaje</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           </div>
           <div class="modal-body">
              <?php if(!empty($errores)):?>
                                                <div>
                                                <ul>
                                                    <?php echo '  <script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>'. $errores;?>
                                                    </ul>
                                                </div>
                                                <?php endif; ?>
                                <?php if(!empty($confirmacion)):?>
                                                <div class="alert alert-success">
                                                <ul>
                                                    <?php echo '  <script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>'. $confirmacion;?>
                                                    </ul>
                                                </div>
                                                <?php endif; ?>
                                 <?php if(!empty($advertencia)):?>
                                                <div class="alert alert-warning">
                                                <ul>
                                                    <?php echo '  <script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>'. $advertencia;?>
                                                    </ul>
                                                </div>
                                                <?php endif; ?> 
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
 
<?php
        if($requicitos >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#info").modal("show");
   });
</script>';
}
       if($recupera_correo >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#myModal").modal("show");
   });
</script>';
}
     if($registro >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#registro").modal("show");
   });
</script>';
}
    
    if($log >= 1){
    echo '
    <script>
   $(document).ready(function()
   {
      $("#login").modal("show");
   });
</script>';
}
    ?>
    
</body>

</html>