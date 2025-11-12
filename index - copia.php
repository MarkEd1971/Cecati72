<?php session_start();
require ('./conexion_db_cecati/conexion_cecati.php');
$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];
$log = ($_REQUEST['login']);
$registro = ($_REQUEST['reg1']); //alta para administrador de la pagina
$recupera_correo = ($_REQUEST['rec_c']);
$sesion1 = $_SESSION['usuario']['t_u'];
$ask = ($_REQUEST['ask']);
$ask2 = ($_REQUEST['ask2']);
$cvc = ($_REQUEST['cv']);
$id_cv = ($_REQUEST['id']);
$registro1 = ($_REQUEST['registro']);
$alum_no = ($_REQUEST['token']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario11 = ($_REQUEST['claveh_1']);
$fail = ($_REQUEST['error']);
$p_correo = ($_REQUEST['p_correo']);
$p_correo2 = ($_REQUEST['p_correo2']);
$id_c = ($_REQUEST['id_c']);
 

$requicitos = ($_REQUEST['info']);

$errores = '';
$confirmacion = '';
$advertencia = '';


/*if($_SESSION['usuario']['tipo'] == '1' ){
    
    if($tipo_usuario == 1){
        header('Location: administrador.php');
    }
    
}*/
$respuesta_correo = ($_REQUEST['res']);

if($respuesta_correo == 'false'){
    $errores.= '<li>El correo no existe.</li>';
}else{
    if($respuesta_correo == 'true'){
        $confirmacion .= '<li>Correo enviado correctamente.</li>';
        $advertencia .= '<li>Si no aparece el correo de confirmación, por favor verifique en correos no deseados.</li>';
        
       // echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=envio_de_correo_curp.php?id='.$id_cv.'&token='.$alum_no.'&clave_c1='.$curso1_s.'&claveh_1='.$horario11.'"></META>';
      //  echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=envio_de_correo_curp.php?id='.$id_clave.'&token='.$alum_no.'&clave_c1='.$curso1_s.'&claveh_1='.$horario11.'&clave_c2='.$curso2_s.'&claveh_2='.$horario12.'"></META>';

    }
}
    if($respuesta_correo == 'error'){
        $errores .= '<li>Ha ocurrido un problema en el servidor, por favor inténtelo mas tarde.</li>';
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $usuario = mysqli_real_escape_string($mysqli,$_POST['userlogin']);
		$password = mysqli_real_escape_string($mysqli,$_POST['pwlogin']);
		if($usuario != ''){
		//$sha1_pass = sha1($password);
        $pwlog = hash('sha512',$password);
		
		$sqlconsulta = "SELECT * FROM usuarios WHERE correo = '$usuario' AND pw = '$pwlog'";
		$result=$mysqli->query($sqlconsulta);
		$rows = $result->num_rows;
		
		if($rows >= 1) {
			$row = $result->fetch_assoc();
           
			//$_SESSION['correo'] = $row['correo'];
			//$_SESSION['tipo_usuario'] = $row['tipo'];
            session_start();
            $_SESSION['usuario'] = $row;
           // var_dump($_SESSION);
			
            header('Location: administrador.php');
			} else {
			$errores .= '<li>El usuario o contraseña son incorrectos.</li>';
		}
}else{
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombre1 = mysqli_real_escape_string($mysqli,$_POST['nom_u']);
        $nombre2 = mysqli_real_escape_string($mysqli,$_POST['nom_u2']);       
        $apellido_p = mysqli_real_escape_string($mysqli,$_POST['apellido_p']);
        $apellido_m = mysqli_real_escape_string($mysqli,$_POST['apellido_m']);
        $correo = mysqli_real_escape_string($mysqli,$_POST['correo']);
		$password = mysqli_real_escape_string($mysqli,$_POST['pwlogin']);
        $spam = mysqli_real_escape_string($mysqli,$_POST['spam']);
        $tipo_u = 1;

        $pwlog = hash('sha512',$password);
         
         if($spam == ''){
        $consulta_u = "SELECT * FROM usuarios WHERE correo = '$correo'";
		$result_u=$mysqli->query($consulta_u);
		$rows_u = $result_u->num_rows;
		
		if($rows_u >= 1) {
			$row_u = $result_u->fetch_assoc();
           
			$errores .= '<h3>El usuario ya se ha registrado.</h3>';
			} else {

             $alta_admin ="INSERT INTO usuarios (nom, nom2, ap_p, ap_m, correo, pw, t_u) VALUES ('$nombre1','$nombre2','$apellido_p','$apellido_m','$correo','$pwlog','$tipo_u')";
                $alta_admin = $mysqli->query($alta_admin); 
         }
		
        }else{
                          $errores .= '<h2>Eres spam, no puede proceder el registro.</h2>';

         }
            
     }
            
        }
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
 <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet"> -->
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
  <!-- Messenger Plugin de chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin de chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "342115442548866");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
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
        
        <li><a href="https://www.cecati72.com">Inscripciones</a></li>
        
        <li><a href="contact.php">Contacto</a></li>
            <?php
             if($sesion1 == ''){
               echo '<li><a href="index.php?login=1">Administrador</a></li>';
            }
            else{
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
    
     <div class="modal fade" id="p_correo" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Proceso de inscripción</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <h4>Para poder inscribirte, primero debes de comprobar tu correo electronico.</h4>
    
          <br>
          
             <div class=" row justify-content-center">
            <center>
							<div class="col-xs-20"> 
                                <br>
                                <br>
								<form id="login-form"  method="POST" role="form" name="busqueda" action="verificacion.php">
									<div class="form-group col-md-20">
										<input type="text" name="correo" id="correo" tabindex="1" class="form-control" placeholder="Escribe tu correo electrónico" value="" required>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="id" id="id" tabindex="1" class="form-control" placeholder="Id" value="<?php echo $id_cv?>" hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="cv" id="cv" tabindex="1" class="form-control" placeholder="Clave curso" value="<?php echo $cvc ?>" hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="id_c" id="id_c" tabindex="1" class="form-control" placeholder="Clave curso" value="<?php echo $id_c ?>" hidden>
									</div>
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-primary"  onclick="login.submit" value="Verificar">
											</div>
										</div>
                                        <br>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
    
      <div class="modal fade" id="p_correo2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Proceso de inscripción</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <h4>Para poder inscribirte, primero debes de comprobar tu correo electronico.</h4>
    
          <br>
          
             <div class=" row justify-content-center">
            <center>
							<div class="col-xs-20"> 
                                <br>
                                <br>
								<form id="login-form"  method="POST" role="form" name="busqueda" action="verificacion2.php">
									<div class="form-group col-md-20">
										<input type="text" name="correo2" id="correo2" tabindex="1" class="form-control" placeholder="Escribe tu correo electrónico" value="" required>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="id" id="id" tabindex="1" class="form-control" placeholder="Id" value="<?php echo $id_cv?>" hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="cv" id="cv" tabindex="1" class="form-control" placeholder="Clave curso" value="<?php echo $cvc ?>" hidden>
									</div>
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-primary"  onclick="login.submit" value="Verificar">
											</div>
										</div>
                                        <br>
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
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
      <div class="modal fade" id="fail" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Error</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <h4>No es posible continuar con la inscripción, ya que no te encontramos en el sistema, por favor de registrarse para poder incribirte a un curso.</h4>
    
          <br>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
    
<!--     <div class="modal fade" id="ask" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Antes de continuar con la inscripción...</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <h3>Por favor, selecciona una opción:</h3> <br>
          <h4><a href="index.php?p_correo=1&id=<?php echo $id_cv.'&cv='.$cvc.'&id_c='.$id_c ;?>" style="color: blue">Nuevo ingreso</a></h4>
    <br>
        <h4><a href="index.php?id=<?php echo $id_cv.'&ask2=1&cv='.$cvc ;?>" style="color: blue">Reinscripción</a></h4>

            <br>
         <h4><a href="registro_beca_cosoleacaque.php?id=<?php echo $id_cv.'&ask2=1&cv='.$cvc ;?>" style="color: blue">Becas</a></h4>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div> -->
    
     <div class="modal fade" id="ask2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Antes de continuar con la inscripción...</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <div class=" row justify-content-center">
            <center>
							<div class="col-xs-20"> 
                                <br>
                                <br>
								<form id="login-form"  method="POST" role="form" name="busqueda" action="procesa_alumno.php">
									<div class="form-group col-md-20">
										<input type="text" name="buscar" id="buscar" tabindex="1" class="form-control" placeholder="Escribe tu correo electrónico" value="" required>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="cv" id="cv" tabindex="1" class="form-control" placeholder="Escribe tu correo electrónico" value="<?php echo $cvc ;?>" hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="id_c" id="id_c" tabindex="1" class="form-control" placeholder="Escribe tu correo electrónico" value="<?php echo $id_c ;?>" hidden>
									</div>
									<!--<div class="form-group col-md-20">
										<input type="password" name="pwlogin" id="pwlogin" tabindex="2" class="form-control" placeholder="Contraseña" required>
									</div>-->
									<!--<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>-->
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-primary"  onclick="login.submit" value="Comprobar">
											</div>
                                            
										</div>
                                        <br>
                                      <!-- <strong align="right"><a href="index.php?rec_c=1" style="color:blue">Olvidé mi contraseña</a></strong>-->
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Registro</strong> i (Beta)</h5>
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
    <!-- Modal -->
<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: blue;">Soporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Si tienes problemas para registrarte, por favor llamar  alguno de los siguientes teléfonos en horario de lunes a viernes de 8:00 a 19:00 hrs: </p>
        <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Teléfono 1:</h4>
                <p>922 2210383</p>
                <h4>Teléfono 2:</h4>
                <p>922 2213057</p>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
    <br>
    <!-- Aqui comienza la seccion de los banners>-->
    <section>
        <div align="right">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#help">
  Ayuda
</button>
        </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
      
<!--    <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="12"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="13"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="14"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="15"></li> -->


  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./assets/img/banner/banner_principal.jpg" alt="Banner Principal">
        <div class="carousel-caption d-none d-md-block">
   
  </div>
    </div>
       <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img1.jpg" alt="Slide 1">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img2.jpg" alt="Slide 2">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img3.jpg" alt="Slide 3">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img4.jpg" alt="Slide 4">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img5.jpg" alt="Slide 5">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img6.jpg" alt="Slide 6">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img7.jpg" alt="Slide 7">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img8.jpg" alt="Slide 8">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img9.jpg" alt="Slide 9">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img10.jpg" alt="Slide 10">
    </div>
<!--      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img11.jpg" alt="Slide 11">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img12.jpg" alt="Slide 12">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img13.jpg" alt="Slide 13">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img14.jpg" alt="Slide 14">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img15.jpg" alt="Slide 15">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/banner/img16.jpg" alt="Slide 16">
    </div> -->
      
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </section>
    
  <!--<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        
        <center><h1>Inscripciones Abiertas</h1></center>
    </div>
  </section>-->
       <!--Aqui empieza la tabla-->
    
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
                  <td><!--<a class="link_delete" href="https://forms.gle/CSB7ZX7EWEjdeCBYA"?id='.$filas[0] = hash('sha512',$filas[0]).'
&cv='.$filas[0].'&token='.$alum_no.'" style="color:black">'.$filas[2].'</a>--> '.$filas[2].'</td>
                  <td><a class="link_delete" href="https://sites.google.com/view/cecati72/inscripciones"?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[1].'&ask=1&id_c='.$filas[0].'">Inscribirme</a></td>
                  <!-- <td><a class="link_delete" href="https://sites.google.com/view/cecati72/inscripciones"?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[0].'"><span class="icon-user-add" style="color:green"></span>Ver cursos.</a></td>-->
                    <!--<td>$filas[4]</td>
                    <td>$filas[8]</td>-->
                    
                    </tr>';
                } 
            echo "</tbody></table> </div>";
            ?>
    <!--Aqui termina la tabla-->
    
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
            <img src="./assets/img/Imagenes/requisitos_secati1.jpg" alt="" class="img-fluid">
            <br>
            <br>
            <br>
            
 <center><h1>SI ESTAS INTERESADO(A) EN ALGUNO DE NUESTROS CURSOS EN PLANTEL</h1>
            <h1>¡<a href="contact.html">CONTÁCTANOS</a> O <a href="https://www.cecati72.com">INSCRÍBETE</a> YA!</h1>
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
       <!-- <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
        </div>-->
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
    
     if($p_correo >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#p_correo").modal("show");
   });
</script>';
}
      if($p_correo2 >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#p_correo2").modal("show");
   });
</script>';
}
     if($fail >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#fail").modal("show");
   });
</script>';
}
    if($registro1 >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#registro2").modal("show");
   });
</script>';
}
       if($ask2 >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#ask2").modal("show");
   });
</script>';
}
     if($ask >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#ask").modal("show");
   });
</script>';
}
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