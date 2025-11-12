<?php session_start();
error_reporting(0);
$sesion1 = $_SESSION['usuario']['t_u'];
$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];

require ('./conexion_db_cecati/conexion_cecati.php');

/////////////////variables get/////////////////////////// 
$cv_curso = ($_REQUEST['cv']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario11 = ($_REQUEST['claveh_1']);
$curso2_s = ($_REQUEST['clave_c2']);
$horario12 = ($_REQUEST['claveh_2']);
$alum_no = ($_REQUEST['token']);
$id_clave = ($_REQUEST['id']);
$pago = ($_REQUEST['pago']);
$pago1 = ($_REQUEST['pago1']);

if($curso2_s >= 1){
    $cv_curso=$curso1_s;
    
     $consulta_n_e1 = "SELECT * FROM especialidades WHERE id = $curso1_s ";
        $ejecutar_cons_e1 = $mysqli->query($consulta_n_e1);
$r_cons_e1 = $ejecutar_cons_e1->fetch_assoc();
          $n_e1 = $r_cons_e1['nombre_e'];
    
     $consulta_n_c1 = "SELECT * FROM cursos WHERE id_c = $horario11 ";
        $ejecutar_cons_c1 = $mysqli->query($consulta_n_c1);
$r_cons_c1 = $ejecutar_cons_c1->fetch_assoc();
          $n_curso1 = $r_cons_c1['nombre_c'];
              $precio_c1 = $r_cons_c1['precio'];

    
     $consulta_n_e2 = "SELECT * FROM especialidades WHERE id = $curso2_s ";
        $ejecutar_cons_e2 = $mysqli->query($consulta_n_e2);
$r_cons_e2 = $ejecutar_cons_e2->fetch_assoc();
          $n_e2 = $r_cons_e2['nombre_e'];
    
     $consulta_n_c2 = "SELECT * FROM cursos WHERE id_c = $horario12 ";
        $ejecutar_cons_c2 = $mysqli->query($consulta_n_c2);
$r_cons_c2 = $ejecutar_cons_c2->fetch_assoc();
          $n_curso2 = $r_cons_c2['nombre_c'];
              $precio_c2 = $r_cons_c2['precio'];
    
    $precio_cons1 = substr($precio_c1, -6); 
    $precio_cons2 = substr($precio_c2, -6); 

                $precio_total = $precio_cons1 + $precio_cons2;
    
  //  mysqli_query ($mysqli, "UPDATE usuarios set pw = '$password' WHERE id = '$usuario'") or die ($errores .= '<li>Ha ocurrido un error en el servidor</li>');

}

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

$info_a = "select * FROM inscripciones where curp = '$alum_no' ";
$respuesta_al = $mysqli->query($info_a);
$res_cons1 = $respuesta_al->fetch_assoc();
$dia_al = $res_cons1['dia'];
$mes_al = $res_cons1['mes'];
$anio_al = $res_cons1['año'];
$sexo_al = $res_cons1['sexo'];
$edo_civil = $res_cons1['edo_civil'];
$nacionalidad = $res_cons1['nacionalidad'];
$nombre_al = $res_cons1['nombre'];
$nombre2 = $res_cons1['nombre2'];
$apellido_al = $res_cons1['apellido_p'];
$apellido_m = $res_cons1['apellido_m'];
$telefono = $res_cons1['telefono'];
$celular = $res_cons1['celular'];
$correo  = $res_cons1['correo'];
$direccion = $res_cons1['direccion'];
$colonia = $res_cons1['colonia'];
$cp = $res_cons1['cp'];
$localidad = $res_cons1['localidad'];
$municipio = $res_cons1['municipio'];
$estado = $res_cons1['estado'];
$n_estudio = $res_cons1['n_estudio'];
$t_sangre = $res_cons1['t_sangre'];
$s_medico = $res_cons1['s_medico'];
$enfermedad = $res_cons1['enfermedad'];
$discapacidad = $res_cons1['discapacidad'];
$motivo = $res_cons1['motivo'];
$medio = $res_cons1['medio'];
$socio_e = $res_cons1['socio_e'];
$personas = $res_cons1['personas'];
$estimacion = $res_cons1['estimacion'];
$n_empresa = $res_cons1['n_empresa'];
$p_trabajo = $res_cons1['p_trabajo'];
$antiguedad = $res_cons1['antiguedad'];
$d_empresa = $res_cons1['d_empresa'];
$t_empresa = $res_cons1['t_empresa'];
$bienes = $res_cons1['bienes'];
$fecha1 = $res_cons1['fecha'];
$horaa = $res_cons1['hora'];

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
$promo = $cons_h['promo'];

if($pago1 >= 1){
    
  //  $confirmacion.= $n_e1.$n_curso1.$n_e2.$n_curso2;
    
    
     $inscripcion_al1 ="INSERT INTO inscripciones (especialidad, curso_h, dia, mes, año, sexo, edo_civil ,curp, nacionalidad, nombre, nombre2, apellido_p, apellido_m, telefono, celular, correo, direccion, colonia, cp, localidad, municipio, estado, n_estudio, t_sangre, s_medico, enfermedad, discapacidad, motivo, medio, socio_e, personas, estimacion, n_empresa, p_trabajo, antiguedad, d_empresa, t_empresa, bienes,fecha ,hora) VALUES ('$n_e1','$n_curso1','$dia_al','$mes_al','$anio_al','$sexo_al','$edo_civil','$alum_no','$nacionalidad','$nombre_al','$nombre2','$apellido_al','$apellido_m','$telefono','$celular','$correo','$direccion','$colonia','$cp','$localidad','$municipio','$estado','$n_estudio','$t_sangre','$s_medico','$enfermedad','$discapacidad','$motivo','$medio','$socio_e','$personas','$estimacion','$n_empresa','$p_trabajo','$antiguedad','$d_empresa','$t_empresa','$bienes','$fecha','$hora')";
                $alta_al1 = $mysqli->query($inscripcion_al1); 
    echo 'procesando';
    
      $inscripcion_al2 ="INSERT INTO inscripciones (especialidad, curso_h, dia, mes, año, sexo, edo_civil ,curp, nacionalidad, nombre, nombre2, apellido_p, apellido_m, telefono, celular, correo, direccion, colonia, cp, localidad, municipio, estado, n_estudio, t_sangre, s_medico, enfermedad, discapacidad, motivo, medio, socio_e, personas, estimacion, n_empresa, p_trabajo, antiguedad, d_empresa, t_empresa, bienes,fecha ,hora) VALUES ('$n_e2','$n_curso2','$dia_al','$mes_al','$anio_al','$sexo_al','$edo_civil','$alum_no','$nacionalidad','$nombre_al','$nombre2','$apellido_al','$apellido_m','$telefono','$celular','$correo','$direccion','$colonia','$cp','$localidad','$municipio','$estado','$n_estudio','$t_sangre','$s_medico','$enfermedad','$discapacidad','$motivo','$medio','$socio_e','$personas','$estimacion','$n_empresa','$p_trabajo','$antiguedad','$d_empresa','$t_empresa','$bienes','$fecha','$hora')";
                $alta_al2 = $mysqli->query($inscripcion_al2); 
    
    
   /* $inscripcion_al1 ="INSERT INTO inscripciones (especialidad, curso_h, curp, correo) VALUES ('$n_e1','$n_curso1','$alum_no','$correo')";
                $alta_al1 = $mysqli->query($inscripcion_al1); 
    echo 'procesando';
    
      $inscripcion_al2 ="INSERT INTO inscripciones (especialidad, curso_h, curp, correo) VALUES ('$n_e2','$n_curso2','$alum_no','$correo')";
                $alta_al2 = $mysqli->query($inscripcion_al2); */
    
         $confirmacion .='<h2>Te registraste correctamente, en breve se enviará un correo electronico para descargar del arancel de pago.</h2>'.'<br>'; 
    
    
   echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=envio_de_correo_curp1.php?id='.$id_clave.'&token='.$alum_no.'&clave_c1='.$curso1_s.'&claveh_1='.$horario11.'&clave_c2='.$curso2_s.'&claveh_2='.$horario12.'"></META>';
}
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombre_cur1 = mysqli_real_escape_string($mysqli,$_POST['n_curso1']);
        $nombre_hora2 = mysqli_real_escape_string($mysqli,$_POST['horario1']);       
        $nombre_cur2 = mysqli_real_escape_string($mysqli,$_POST['n_curso2']);
        $nombre_hora2 = mysqli_real_escape_string($mysqli,$_POST['horario2']);
    

     $inscripcion_al1 ="INSERT INTO inscripciones (especialidad, curso_h, curp, correo) VALUES ('$nombre_cur1','$nombre_hora2','$alum_no','$correo')";
                $alta_al1 = $mysqli->query($inscripcion_al1); 
    
            $inscripcion_al2 ="INSERT INTO inscripciones (especialidad, curso_h, curp, correo) VALUES ('$nombre_cur2','$nombre_hora2','$alum_no','$correo')";
                $alta_al2 = $mysqli->query($inscripcion_al2); 
    
       /*   $confirmacion .='<h2>Te registrsate correctamente, en breve se enviará un correo electronico para descargar del arancel de pago.</h2>'.'<br>';  
    
    echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=envio_de_correo_curp.php?id='.$uss = hash('sha512',$uss).'&token='.$curp.'&n_curso2='.$nombre_cur2.'&horario2='.$nombre_hora2.'
"></META>';
     }*/
           
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
            <li><a href="https://forms.gle/CSB7ZX7EWEjdeCBYA">Inscripciones</a></li>
          <li><a href="contact.php">Contacto</a></li>
            

          <!--<li><a href="index.php?ask=1">Inscripciones</a></li>-->
            <!--li class="drop-down"><a href="#">Inscripciones</a>
            <ul>
            <!--  <li><a href="index.php?ask=1">Clases en línea</a></li>-->
              <!--li><a href="index.php?p_correo=1">Nuevo ingreso</a></li>
              <li><a href="index.php?ask2=1">Reingreso</a></li>      
              <li><a href="index.php?p_correo2=1">Becas Cosoleacaque</a></li>

            </ul>
          </li>
             <li><a href="contact.php">Contacto</a></li>
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
          <h2> <?php echo $n_curso; ?></h2>
                </div>
    </div>
  </main>
    <div class="modal fade" id="pago" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Proceso de Inscripción</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">          
            <h4>Detalle de los cursos al que se inscribe:</h4>
            <br>
            <strong>Curso 1:</strong>
            <?php echo $n_e2;?> <br>
            <strong>Horario:</strong> <?php echo $n_curso2 ;?><br><br>
            <strong>Curso 2: </strong>
            <?php echo $n_e1 ; ?> <br>
            <strong>Horario:</strong> <?php echo $n_curso1 ;?>
            <br>
            <br>
            <h5 align="right"><strong>Costo sin promoción: </strong><?php echo '$'.$precio_total ;?></h5>
            <h5 align="right"><strong>Costo con promoción: </strong> $600</h5>
            
             <div class=" row justify-content-center">
            <center>
							<div class="col-xs-20">
							<!--	<form id="login-form"  method="POST" role="form" name="registro" action="procesa_pago.php">
									<div class="form-group col-md-20">
										<input type="text" name="n_curso1" id="n_curso1" tabindex="1" class="form-control" placeholder="<?php echo $n_e2;?>" value="<?php echo $n_e2;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="horario1" id="n_horario" tabindex="1" class="form-control" placeholder="<?php echo $n_curso2;?>" value="<?php echo $n_curso2;?>" hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="n_curso2" id="n_curso2" tabindex="1" class="form-control" placeholder="<?php echo $n_e1;?>" value="<?php echo $n_e1;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="horario2" id="horario2" tabindex="1" class="form-control" placeholder="<?php echo $n_curso1;?>" value="<?php echo $n_curso1;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="token" id="token" tabindex="1" class="form-control" placeholder="<?php echo $alum_no;?>" value="<?php echo $alum_no;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="id" id="id" tabindex="1" class="form-control" placeholder="<?php echo $id_clave;?>" value="<?php echo $id_clave;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="correo" id="correo" tabindex="1" class="form-control" placeholder="<?php echo $correo;?>" value="<?php echo $correo;?>" required hidden>
									</div>
                                    
                                    <div class="form-group col-md-20">
										<input type="text" name="correo" id="correo" tabindex="1" class="form-control" placeholder="<?php echo $correo;?>" value="<?php echo $correo;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="correo" id="correo" tabindex="1" class="form-control" placeholder="<?php echo $correo;?>" value="<?php echo $correo;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="correo" id="correo" tabindex="1" class="form-control" placeholder="<?php echo $correo;?>" value="<?php echo $correo;?>" required hidden>
									</div>
                                    <div class="form-group col-md-20">
										<input type="text" name="correo" id="correo" tabindex="1" class="form-control" placeholder="<?php echo $correo;?>" value="<?php echo $correo;?>" required hidden>
									</div>
                                    
                                    <!--<div class="form-group col-md-20">
										<input type="text" name="total" id="total" tabindex="1" class="form-control" placeholder="<?php echo $n_curso1;?>" value="<?php echo $n_curso1;?>">
									</div>-->
									<!--<div class="form-group">-->
										<!--<div class="card-body d-flex justify-content-between align-items-right">
											<div class="col-sm-12 col-sm-offset-3">
												<input type="submit"  id="entrar" tabindex="4" class="form-control btn btn-success"  onclick="login.submit" value="Pagar">
											</div>
                                            
										</div>
									<!--</div>	-->								
							<!--	</form>-->
                </div> </center></div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success"><a href="<?php echo 'seleccion_horario1.php?id='.$id_clave.'&token='.$alum_no.'&clave_c1='.$cv_curso.'&claveh_1='.$horario11.'&clave_c2='.$curso2_s.'&claveh_2='.$horario12.'&pago1=2' ;?>" style="color:white;">Pagar</a></button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
    </div>
  </div>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
          <h3>Hola <?php echo $nombre_al.'&nbsp;'.$apellido_al ;?></h3>
          <br>
          Seleccióna el segundo horario  del segundo curso al que desee inscribirse.
          
          <?php 
          echo '<div "table-responsive">
            <table class="table table-striped">
            <thead>
            <th>Curso/horario</th>
            <!--<th>Periodo</ht>-->
            <!--<th>Término</th>-->
            <th>Precio</th>
            <th></th>
           <!-- <th></th>-->
            </thead>
            <tbody>
            ';
                //$n = 0;
                while($filas1 = $nomb_curso->fetch_row()){
                  //  $id= $filas[0];
                    
                    echo '<tr>
                    
                  <!--  <td>'.$filas1[0].'</td>-->
                    <td>'.$filas1[2].' Inicio: '.$filas1[4].' Termína: '.$filas1[5].'</td>
                    <td>'.$filas1[3].'</td>
                  <!--  <td> <a href="seleccion_e.php?id='.$id_clave.'">Seleccionár.</a></td>-->
                    <td><a href="seleccion_horario1.php?id='.$id_clave.'&token='.$alum_no.'&clave_c1='.$cv_curso.'&claveh_1='.$filas1[0].'&clave_c2='.$curso1_s.'&claveh_2='.$horario11.'&pago=1">Seleccionár y pagar.</a></td>
                    <!--<td>'.$filas1[5].'</td>-->
                   <!-- <td>'.$filas1[3].'</td>-->
                    </tr>';
                } 
            echo "</tbody></table> </div>";
          ?>
          
          <br>
          <br>
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
    
     <?php
      if($pago >= 1){
    echo '
   <script>
   $(document).ready(function()
   {
      $("#pago").modal("show");
   });
</script>';
}
    ?>
    
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
</body>
</html>