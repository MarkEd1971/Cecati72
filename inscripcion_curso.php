<?php session_start();
error_reporting(0);
$sesion1 = $_SESSION['usuario']['t_u'];
$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];

require ('./conexion_db_cecati/conexion_cecati.php');

/////////////////variables get/////////////////////////// 
$cv_curso = ($_REQUEST['cv']);
 $errores = '';
 $confirmacion= '';
///////////////////obtener fecha/////////////////////////
date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
$es_actual=strftime("%m");
$year_actual=strftime("%Y");
$dia_actual=strftime("%d");

   // $fecha_actual=strftime("%d-%m-%Y");
        
    $hora_actual=strftime("%H:%M:%S");
$hora = $hora_actual.' Hrs.';
$fecha = $dia_actual.'/'.$es_actual.'/'.$year_actual;

///////////////////primera consulta //////////////////////
 $consulta_nc = "SELECT * FROM especialidades WHERE id = $cv_curso ";
        $ejecutar_cons = $mysqli->query($consulta_nc);
$r_cons = $ejecutar_cons->fetch_assoc();
          $n_curso = $r_cons['nombre_e'];
//////////////////consulta nombre de cursos/////////////////
$query = "select * FROM cursos where id = $cv_curso ORDER BY nombre_c ASC";
$nomb_curso = $mysqli->query($query);
//////////////////consulta de horarios/////////////////////
$horario1lv = "select * FROM cursos where id = $cv_curso ";
$horario1 = $mysqli->query($horario1lv);
$cons_h = $horario1->fetch_assoc();
$cons_h_m = $cons_h['horario_m'];
$cons_h_v = $cons_h['horario_v'];
$cons_h_s = $cons_h['horario_s'];
$cons_edo = $cons_h['estado'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $especialidad = filter_var($_POST['nom_especial'],FILTER_SANITIZE_STRING);
    $curso_h = filter_var($_POST['curso_h'],FILTER_SANITIZE_STRING);
    $dia = filter_var($_POST['dia'],FILTER_SANITIZE_STRING);
    $mes = filter_var($_POST['mes'],FILTER_SANITIZE_STRING);
    $anio = filter_var($_POST['anio'],FILTER_SANITIZE_STRING);
    $sexo = filter_var($_POST['sexo'],FILTER_SANITIZE_STRING);
    $edo_civil = filter_var($_POST['edo_civil'],FILTER_SANITIZE_STRING);
    $curp = filter_var($_POST['curp'],FILTER_SANITIZE_STRING);
    $nacionalidad = filter_var($_POST['nacionalidad'],FILTER_SANITIZE_STRING);
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $nombre2 = filter_var($_POST['nombre2'],FILTER_SANITIZE_STRING);
    $apellido_p = filter_var($_POST['apellido_p'],FILTER_SANITIZE_STRING);
    $apellido_m = filter_var($_POST['apellido_m'],FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);
    $celular = filter_var($_POST['celular'],FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'],FILTER_SANITIZE_STRING);
    $direccion = filter_var($_POST['direccion'],FILTER_SANITIZE_STRING);
    $colonia = filter_var($_POST['colonia'],FILTER_SANITIZE_STRING);
    $cp = filter_var($_POST['cp'],FILTER_SANITIZE_STRING);
    $localidad = filter_var($_POST['localidad'],FILTER_SANITIZE_STRING);
    $municipio = filter_var($_POST['municipio'],FILTER_SANITIZE_STRING);
    $estado = filter_var($_POST['estado'],FILTER_SANITIZE_STRING);
    $n_estudio = filter_var($_POST['n_estudio'],FILTER_SANITIZE_STRING);
    $t_sangre = filter_var($_POST['t_sangre'],FILTER_SANITIZE_STRING);
    $s_medico = filter_var($_POST['s_medico'],FILTER_SANITIZE_STRING);
    $enfermedad = filter_var($_POST['enfermedad'],FILTER_SANITIZE_STRING);
    $discapacidad = filter_var($_POST['discapacidad'],FILTER_SANITIZE_STRING);
    $motivo = filter_var($_POST['motivo'],FILTER_SANITIZE_STRING);
    $medio = filter_var($_POST['medio'],FILTER_SANITIZE_STRING);
    $socio_e = filter_var($_POST['socio_e'],FILTER_SANITIZE_STRING);
    $personas = filter_var($_POST['personas'],FILTER_SANITIZE_STRING);
    $estimacion = filter_var($_POST['estimacion'],FILTER_SANITIZE_STRING);
    $n_empresa = filter_var($_POST['n_empresa'],FILTER_SANITIZE_STRING);
    $p_trabajo = filter_var($_POST['p_trabajo'],FILTER_SANITIZE_STRING);
    $antiguedad = filter_var($_POST['antiguedad'],FILTER_SANITIZE_STRING);
    $d_empresa = filter_var($_POST['d_empresa'],FILTER_SANITIZE_STRING);
    $t_empresa = filter_var($_POST['t_empresa'],FILTER_SANITIZE_STRING);
    $bienes = filter_var($_POST['optradio'],FILTER_SANITIZE_STRING);
    $bienes2 = filter_var($_POST['optradio2'],FILTER_SANITIZE_STRING);
    $bienes3 = filter_var($_POST['optradio3'],FILTER_SANITIZE_STRING);
    $bienes4 = filter_var($_POST['optradio4'],FILTER_SANITIZE_STRING);
    $bienes5 = filter_var($_POST['optradio5'],FILTER_SANITIZE_STRING);
    $bienes6 = filter_var($_POST['optradio6'],FILTER_SANITIZE_STRING);
    $bienes7 = filter_var($_POST['optradio7'],FILTER_SANITIZE_STRING);
    $bienes8 = filter_var($_POST['optradio8'],FILTER_SANITIZE_STRING);
    $bienes9 = filter_var($_POST['optradio9'],FILTER_SANITIZE_STRING);
    $bienes10 = filter_var($_POST['optradio10'],FILTER_SANITIZE_STRING);
                
    $comp_year = $year_actual-$anio;
    
    $tamano_curp = strlen($curp);
    
    $bienes_n = $bienes.', '.$bienes2.', '.$bienes3.' '.$bienes4.', '.$bienes5.', '.$bienes6.', '.$bienes7.', '.$bienes8.', '.$bienes9.', '.$bienes10.'.';
                
                
//redireccionar  <META HTTP-EQUIV="Refresh" CONTENT="3; URL=log_in.php "></META>
                
 /*if($curso_h == '' or $dia == '' or $mes == '' or $anio == '' or $sexo == '' or $edo_civil == '' or $curp == '' or $nacionalidad == '' or $nombre == '' or $apellido_p == '' or $apellido_m == '' or $correo == '' or $direccion == '' or $colonia == '' or $cp == '' or $localidad == '' or $municipio == '' or $estado == '' or $n_estudio == '' or $t_sangre == '' or $s_medico == '' or $enfermedad == '' or $discapacidad == '' or $motivo == '' or $medio == '' or $personas == '' or $estimacion ==''){
   
     $errores .= '<h2>Por favor, llene todos los campos del formulario.</h2>';
     $errores .= '<br>';
 }*/
    
    if($curp == ''){
   
     $errores .= '<h2>Por favor, llene todos los campos del formulario.</h2>';
     $errores .= '<br>';
 }else{
     if($tamano_curp >= 18){
     if($comp_year >= 16){
    $errores .= '<h2>Puede inscribirse 1.</h2>';
     }if($comp_year < 15){
         $errores .= '<h2>No puedes inscribirte, aun no tienes la edad minima requerida.</h2>';
     }
         else{
         if($mes > $es_actual){
             $errores .= '<h2>Aun no cumples la edad minima 1.1.</h2>';
             
         }else{
             if($es_actual == $mes){
                 if($dia <= $dia_actual){
                     $errores .= '<h2>Puede inscribirse 2</h2>';
                 }else{
                     $errores .= '<h2>aun no cumples la edad minima.</h2>';
                 }
             }else{
                 if($mes < $es_actual){
                     $errores .= '<h2>Puede inscribirse 3.</h2>';
                 }else{
                     $errores .= '<h2>No puedes inscribirte, aun no tienes la edad minima.</h2>';
                 }
             }
         }
         $errores .= '<h2>'.$comp_year.$es_actual.$dia_actual.'</h2>';
     }//
     }else{
         $errores .= '<h2>La curp no es valida</h2>';
     }
            
    //////////////comprobar que el correo contenga el @/////////
/////////////////////comprobacion de que la dimencion de la curp sea valida/////////////////
     
        
       /* $f_inscripcion3 ="INSERT INTO inscripciones (especialidad, curso_h, dia, mes, año, sexo, edo_civil ,curp, nacionalidad, nombre, nombre2, apellido_p, apellido_m, telefono, celular, correo, direccion, colonia, cp, localidad, municipio, estado, n_estudio, t_sangre, s_medico, enfermedad, discapacidad, motivo, medio, socio_e, personas, estimacion, n_empresa, p_trabajo, antiguedad, d_empresa, t_empresa, bienes,fecha ,hora) VALUES ('$especialidad','$curso_h','$dia','$mes','$anio','$sexo','$edo_civil','$curp','$nacionalidad','$nombre','$nombre2','$apellido_p','$apellido_m','$telefono','$celular','$correo','$direccion','$colonia','$cp','$localidad','$municipio','$estado','$n_estudio','$t_sangre','$s_medico','$enfermedad','$discapacidad','$motivo','$medio','$socio_e','$personas','$estimacion','$n_empresa','$p_trabajo','$antiguedad','$d_empresa','$t_empresa','$bienes_n','$fecha','$hora')";
                $f_inscripcion3 = $mysqli->query($f_inscripcion3); 
     
     $confirmacion .='<h2>Completaste el formulario,en breve se enviará un correo electronico para descargar del arancel de pago.</h2>'.'<br>';
    // $confirmacion .='<p>Si no comienza la descarga, por favor pulsa el botón descargar.</p>' .'<br>';
   //  $confirmacion .='<button class="btn btn-primary" ><a href="reporte_pdf.php?pdf=Arancel_cursos_a_distancia.jpg">Descargar</a></button>';
     
     echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=envio_de_correo_curp.php?id='.$uss = hash('sha512',$uss).'&token='.$curp.'
"></META>';*/
         
        /*if($comp_year == 15){
        if($mes > $es_actual){

$f_inscripcion1 ="INSERT INTO inscripciones (especialidad, curso_h, dia, mes, año, sexo, edo_civil ,curp, nacionalidad, nombre, nombre2, apellido_p, apellido_m, telefono, celular, correo, direccion, colonia, cp, localidad, municipio, estado, n_estudio, t_sangre, s_medico, enfermedad, discapacidad, motivo, medio, socio_e, personas, estimacion, n_empresa, p_trabajo, antiguedad, d_empresa, t_empresa, bienes) VALUES ('$especialidad','$curso_h','$dia','$mes','$anio','$sexo','$edo_civil','$curp','$nacionalidad','$nombre','$nombre2','$apellido_p','$apellido_m','$telefono','$celular','$correo','$direccion','$colonia','$cp','$localidad','$municipio','$estado','$n_estudio','$t_sangre','$s_medico','$enfermedad','$discapacidad','$motivo','$medio','$socio_e','$personas','$estimacion','$n_empresa','$p_trabajo','$antiguedad','$d_empresa','$t_empresa','$bienes_n'  )";
                $f_inscripcion1 = $mysqli->query($f_inscripcion1); 
            $errores.='supera el mes';
        }else{
            if($dia_actual >= $dia){
///////////ingresar todos los datos a la base de datos/////////////
       // $confirmacion .= '<h2>Has completado el primer paso, por favor no olvides enviar el correo con los documentos escaneados.</h2>';
//////////////////insertar registro a base de datos//////////////////////////////    
                
$f_inscripcion2 ="INSERT INTO inscripciones (especialidad, curso_h, dia, mes, año, sexo, edo_civil ,curp, nacionalidad, nombre, nombre2, apellido_p, apellido_m, telefono, celular, correo, direccion, colonia, cp, localidad, municipio, estado, n_estudio, t_sangre, s_medico, enfermedad, discapacidad, motivo, medio, socio_e, personas, estimacion, n_empresa, p_trabajo, antiguedad, d_empresa, t_empresa, bienes) VALUES ('$especialidad','$curso_h','$dia','$mes','$anio','$sexo','$edo_civil','$curp','$nacionalidad','$nombre','$nombre2','$apellido_p','$apellido_m','$telefono','$celular','$correo','$direccion','$colonia','$cp','$localidad','$municipio','$estado','$n_estudio','$t_sangre','$s_medico','$enfermedad','$discapacidad','$motivo','$medio','$socio_e','$personas','$estimacion','$n_empresa','$p_trabajo','$antiguedad','$d_empresa','$t_empresa','$bienes_n'  )";
                $f_inscripcion2 = $mysqli->query($f_inscripcion2); 
                $errores.='<h2>Supera el dia</h2>';
            }else{
                $errores .= '<h2>No cumple con la edad minima.</h2>';
            }
        }
        }else{
            if($comp_year > 15){
                ///////////ingresar todos los datos a la base de datos/////////////
       // $confirmacion .= '<h2>Has completado el primer paso, por favor no olvides enviar el correo con los documentos escaneados.</h2>';
//////////////////insertar registro a base de datos//////////////////////////////    
                $f_inscripcion3 ="INSERT INTO inscripciones (especialidad, curso_h, dia, mes, año, sexo, edo_civil ,curp, nacionalidad, nombre, nombre2, apellido_p, apellido_m, telefono, celular, correo, direccion, colonia, cp, localidad, municipio, estado, n_estudio, t_sangre, s_medico, enfermedad, discapacidad, motivo, medio, socio_e, personas, estimacion, n_empresa, p_trabajo, antiguedad, d_empresa, t_empresa, bienes) VALUES ('$especialidad','$curso_h','$dia','$mes','$anio','$sexo','$edo_civil','$curp','$nacionalidad','$nombre','$nombre2','$apellido_p','$apellido_m','$telefono','$celular','$correo','$direccion','$colonia','$cp','$localidad','$municipio','$estado','$n_estudio','$t_sangre','$s_medico','$enfermedad','$discapacidad','$motivo','$medio','$socio_e','$personas','$estimacion','$n_empresa','$p_trabajo','$antiguedad','$d_empresa','$t_empresa','$bienes_n')";
                $f_inscripcion3 = $mysqli->query($f_inscripcion3); 
                $errores.='<h2>mayor a 16</h2>';
            }else{
                $errores .= '<h2>No cumple con la edad minima.</h2>';
            }
        }*/
///////////ingresar todos los datos a la base de datos/////////////
       // $confirmacion .= '<h2>Has completado el primer paso, por favor no olvides enviar el correo con los documentos escaneados.</h2>';
//////////////////insertar registro a base de datos//////////////////////////////        

        
    //    $errores .= '<h2>Sitio web aún en desarrollo, por favor disculpe las molestias.</h2>';
    //    $errores .= '<p>Pronto se encontrará funcionando correctamente.</p>';

 }
            }
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cecati 72 - INSCRIPCIONES</title>
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
  <script src="js/jquery-3.3.1.min.js"></script>
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
  <main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Inscripción a la Especialidad de: </h2>
          <h2> <?php echo $n_curso.'/'.$comp_year; ?></h2>
                </div>
    </div>
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <form action="" method="post" action="<?php echo htmlspecialchars($_SERVER1['PHP_SELF']); ?>" >
            <div><h2>Datos del curso al que se inscribe</h2></div>
  <div class="form-row">
      <div class="form-group col-md-6">
      <label for="inputCity">Especialidad</label>
      <input type="text" class="form-control" name="" id="" placeholder="<?php echo $n_curso?>" value="<?php echo $n_curso?>" disabled>
    </div> 
      <div class="form-group col-md-6">
      <label for="inputState">Cursos y horario</label>
      <select name="curso_h" id="curso_h" class="form-control">
        <option value=""></option>
          <?php while($row = $nomb_curso->fetch_assoc()) { ?>
					<option value="<?php echo $row['nombre_c']; ?>"><?php echo $row['nombre_c']; ?></option>
				<?php } ?>
      </select>
    </div>
       <div class="form-group col-md-6">
      <label for="inputCity"></label>
      <input type="text" class="form-control" name="nom_especial" id="nom_especial" placeholder="<?php echo $n_curso?>" value="<?php echo $n_curso?>" hidden>
    </div> 
      <br>
      <div class="form-group col-md-12">
      <label for="inputCity"><h2>Datos generales</h2></label>
    </div>
      <div class="form-group col-md-2">
      <label for="inputCity">Fecha de nacimiento</label>
      <input type="text" class="form-control" name="dia" id="dia"placeholder="Día" value="<?php echo $dia;?>">
    </div>
          <div class="form-group col-md-2">
      <label for="inputState">Mes</label>
      <select name="mes" id="mes" class="form-control">
        <option ></option>
        <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
      </select>
    </div>
      <div class="form-group col-md-2">
      <label for="inputCity">.</label>
      <input type="text" class="form-control" name="anio" id="anio"placeholder="Año/ 2000" value="<?php echo $anio;?>">
    </div>
      <div class="form-group col-md-3">
      <label for="inputState">Sexo</label>
      <select name="sexo" id="sexo" class="form-control">
        <option ></option>
        <option>Hombre</option>
        <option>Mujer</option>
      </select>
    </div>
      <div class="form-group col-md-3">
      <label for="inputState">Estado civil.</label>
      <select name="edo_civil" id="edo_civil" class="form-control">
        <option ></option>
        <option>Soltero</option>
        <option>Casado</option>
        <option>Viudo/a</option>
        <option>Unión libre</option>
      </select>
    </div>
      <div class="form-group col-md-4">
      <label for="inputCity">CURP</label>
      <input type="text" class="form-control" name="curp" id="curp" placeholder="CURP" value="<?php echo $curp;?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
    </div>
      <div class="form-group col-md-14">
      <label for="inputState">Nacionalidad.</label>
      <select name="nacionalidad" id="nacionalidad" class="form-control">
        <option ></option>
        <option>MEXICANA</option>
        <option>EXTRANJERO</option>
      </select>
    </div>   
      <div class="form-group col-md-3">
      <label for="inputCity">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre;?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Segundo nombre (opcional).</label>
      <input type="text" class="form-control" name="nombre2" id="nombre2"placeholder="Opcional" value="<?php echo $nombre2;?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Apellido paterno</label>
      <input type="text" class="form-control" name="apellido_p" id="apellido_p" placeholder="Apellido paterno" value="<?php echo $apellido_p;?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Apellido materno</label>
      <input type="text" class="form-control" name="apellido_m" id="apellido_m" placeholder="Apellido materno" value="<?php echo $apellido_m;?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Teléfono</label>
      <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $telefono;?>">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Celular</label>
      <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular" value="<?php echo $celular;?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Correo</label>
      <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo;?>">
    </div>
    <!--  <div class="form-group col-md-4">
      <label for="inputEmail4">Contraseña</label>
      <input type="password" class="form-control" name="pw" id="pw" placeholder="Contraseña" value="<?php echo $contrasena;?>">
    </div>-->
      <div class="form-group col-md-5">
      <label for="inputCity">Dirección</label>
      <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Calle y número" value="<?php echo $direccion;?>">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Colonia</label>
      <input type="text" class="form-control" name="colonia" id="colonia" placeholder="Colonia" value="<?php echo $colonia;?>">
    </div>
      <div class="form-group col-md-2">
      <label for="inputCity">Codigo Postal</label>
      <input type="text" class="form-control" name="cp" id="cp" placeholder="C.P." value="<?php echo $cp;?>">
    </div>
      <div class="form-group col-md-2">
      <label for="inputCity">Localidad</label>
      <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Escribe la localidad" value="<?php echo $localidad;?>">
    </div>
      <div class="form-group col-md-2">
      <label for="inputCity">Municipio</label>
      <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Escribe el municipio" value="<?php echo $municipio;?>">
    </div>
      <div class="form-group col-md-2">
      <label for="inputCity">Estado</label>
      <input type="text" class="form-control" name="estado" id="estado" placeholder="Escribe el estado" value="<?php echo $estado;?>">
    </div>
      <div class="form-group col-md-2">
      <label for="inputState">Nivel de estudios</label>
      <select name="n_estudio" id="n_estudio" class="form-control">
        <option ></option>
        <option>Primaria</option>
        <option>Secundaria</option>
        <option>Bachillerato</option>
        <option>Licenciatura</option>
        <option>Posgrado</option>
      </select>
    </div>
       <div class="form-group col-md-2">
      <label for="inputState">Tipo de sangre</label>
      <select name="t_sangre" id="t_sangre" class="form-control">
        <option ></option>
        <option>O+</option>
        <option>O-</option>
        <option>A+</option>
        <option>A-</option>
        <option>AB+</option>
        <option>AB-</option>
      </select>
    </div>
      <div class="form-group col-md-3">
      <label for="inputState">Servicio medico con el que cuenta</label>
      <select name="s_medico" id="s_medico" class="form-control">
        <option ></option>
        <option>IMSS</option>
        <option>ISSSTE</option>
        <option>Insabi</option>
        <option>Ninguno</option>
      </select>
    </div>
       <div class="form-group col-md-5">
      <label for="inputState">¿Padece de alguna enfermedad cronica degenerativa?</label>
      <select name="enfermedad" id="enfermedad" class="form-control">
        <option ></option>
        <option>Ninguna</option>
        <option>Diabetes</option>
        <option>Hiperensión</option>
        <option>Epilepsia</option>
      </select>
    </div>
       <div class="form-group col-md-4">
      <label for="inputState">¿Tiene alguna discapacidad?</label>
      <select name="discapacidad" id="discapacidad" class="form-control">
        <option ></option>
        <option>Ninguna</option>
        <option>Auditiva</option>
        <option>Motriz</option>
        <option>Visual</option>
        <option>Cognitiva</option>
      </select>
    </div>
       <div class="form-group col-md-12">
      <label for="inputCity"><h2>Motivo y elección</h2></label>
    </div>
      <div class="form-group col-md-3">
      <label for="inputState">Motivo por el que desea capacitarse</label>
      <select name="motivo" id="motivo" class="form-control">
        <option ></option>
        <option>Para mejorar su situación laboral</option>
        <option>Por disponer de tiempo libre</option>
        <option>Para conseguir empleo</option>
        <option>Para autoemplearse </option>
        <option>En esperar de continuar estudios</option>
        <option>Por superación personal</option>
      </select>
    </div>
      <div class="form-group col-md-3">
      <label for="inputState">Medio por el que se enteró</label>
      <select name="medio" id="medio" class="form-control">
        <option ></option>
        <option>Volantes</option>
        <option>Periódico</option>
        <option>Radio</option>
        <option>Internet</option>
        <option>Perifoneo</option>
        <option>Conferencia o platica</option>
      </select>
    </div>
       <div class="form-group col-md-12">
      <label for="inputCity"><h2>Información socioeconómica</h2></label>
    </div>
      <div class="form-group col-md-12">
          <label class="radio-inline">
      <input type="checkbox" name="socio_e" value="Estudiante"> &nbsp;Estudiante&nbsp;
    </label>
    <label class="radio-inline">
      <input type="checkbox" name="socio_e" value="Trabaja por su cuenta">&nbsp;Trabaja por su cuenta &nbsp;
    </label>
    <label class="radio-inline-1">
      <input type="checkbox" name="socio_e" class="fantasma" value="Trabaja en una empresa">&nbsp;Trabaja en una empresa &nbsp;
    </label>
      </div>
        <div class="form-group col-md-5">
      <label for="inputState">Personas que contribuyen a mantener la casa donde vive.</label>
      <select name="personas" id="personas" class="form-control">
        <option ></option>
        <option>1</option>
        <option>2</option>
        <option>Más de 2</option>
      </select>
    </div>
        <div class="form-group col-md-3">
      <label for="inputState">Estimación de ingresos mensuales.</label>
      <select name="estimacion" id="estimacion" class="form-control">
        <option ></option>
        <option>Menos de 5000 pesos</option>
        <option>Más de 5000 pesos</option>
      </select>
    </div>
      <div class="form-group col-md-12">
          <h2>Bienes y servicios con los que cuenta</h2>
          <label class="radio">
      <input type="checkbox" name="optradio" value="Lavadora de ropa"> &nbsp;Lavadora de ropa&nbsp;
    </label>
    <label class="radio">
      <input type="checkbox" name="optradio2" value="Telefono celular">&nbsp;Teléfono celular &nbsp;
    </label>
    <label class="radio">
      <input type="checkbox" name="optradio3" value="Computadora personal">&nbsp;Computadora personal &nbsp;
    </label>
          <label class="radio">
      <input type="checkbox" name="optradio4" value="Automóvil">&nbsp;Automóvil &nbsp;
    </label>
          <label class="radio">
      <input type="checkbox" name="optradio5" value="Calentador de tanque">&nbsp;Calentador de tanque &nbsp;
    </label>
          <label class="radio">
      <input type="checkbox" name="optradio6" value="Linea telefónica">&nbsp;Linea telefónica &nbsp;
    </label>
          <label class="radio">
      <input type="checkbox" name="optradio7" value="Televisión por cable">&nbsp;Televisión por cable &nbsp;
    </label>
    <label class="radio">
      <input type="checkbox" name="optradio8" value="Aspiradora">&nbsp;Aspiradora &nbsp;
    </label>
          <label class="radio">
      <input type="checkbox" name="optradio9" value="Tostadora de pan">&nbsp;Tostadora de pan &nbsp;
    </label>
          <label class="radio">
      <input type="checkbox" name="optradio10" value="Personas en servicio de planta y/o entrada por salida">&nbsp;Personas en servicio de planta y/o entrada por salida &nbsp;
    </label>
      </div>
      <div id="dvOcultar" style="display: none" class="form-group">

      <div class="form-group col-md-14">
      <label for="inputCity">Nombre de la empresa donde trabaja</label>
      <input type="text" class="form-control" name="n_empresa" id="n_empresa" placeholder="Respuesta" value="<?php echo $n_empresa;?>">
    </div>
          <div class="form-group col-md-14">
      <label for="inputCity">Puesto de trabajo</label>
      <input type="text" class="form-control" name="p_trabajo" id="p_trabajo" placeholder="Respuesta" value="<?php echo $p_trabajo;?>">
    </div>
       <div class="form-group col-md-14">
      <label for="inputState">Tiempo de antigüedad en el trabajo.</label>
      <select name="antiguedad" id="antiguedad" class="form-control">
        <option ></option>
        <option>Menos de 1 año</option>
        <option>1 a 5 años</option>
        <option>Más de 5 años</option>
      </select>
    </div>    
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Dirección de la empresa</label>
    <textarea class="form-control" name="d_empresa" id="d_empresa" rows="3" ></textarea>
  </div>
          <div class="form-group col-md-14">
      <label for="inputCity">Teléfono de la empresa donde trabaja</label>
      <input type="text" class="form-control" name="t_empresa" id="t_empresa" placeholder="Respuesta" value="<?php echo $t_empresa;?>">
    </div>
      </div>
  </div>
  <div class="form-group">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>        
<div class="modal fade bd-example-modal-lg" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
               <h3 style="color: red">Mensaje.</h3>
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
          <a href="inscripciones.php" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
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
  <script >
  $(function(){
	$('.fantasma').change(function(){
  	if(!$(this).prop('checked')){
    	$('#dvOcultar').hide();
    }else{
    	$('#dvOcultar').show();
    }
  
  }
                         )
})
</script>
    <script>
   $(document).ready(function()
   {
      $("#info1").modal("show");
   });
</script>
</body>
</html>