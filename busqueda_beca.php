<?php session_start();
require ('./conexion_db_cecati/conexion_cecati.php');
$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];
$log = ($_REQUEST['login']);
$registro = ($_REQUEST['reg1']);
$recupera_correo = ($_REQUEST['rec_c']);
$sesion1 = $_SESSION['usuario']['t_u'];
 $busqueda = ($_REQUEST['busqueda']);
$elimina = ($_REQUEST['c_v']);
$excel = ($_REQUEST['su']);
$cambio = ($_REQUEST['cambio']);
$cambio1 = ($_REQUEST['cv']);
$verifica = ($_REQUEST['verifica']);
 $curp = ($_REQUEST['token']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario11 = ($_REQUEST['claveh_1']);


$errores = '';
$confirmacion = '';
$advertencia = '';


$sesion1 = $_SESSION['usuario']['t_u'];
if($sesion1 == ''){
if($excel == ''){
    header('Location: index.php');
}
}
   
if($elimina != ''){
    mysqli_query($mysqli,"Delete From inscripciones2 WHERE id = '$elimina'");
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=busqueda_beca.php?id='.$cv_curso1 = hash('sha512',$cv_curso1).'&cv='.$cv_curso1.'&busqueda='.$busqueda.' "></META>';

}
if($cambio >= 1){
    
     mysqli_query ($mysqli, "UPDATE inscripciones2 set pago = 'Pagado' WHERE id = '$cambio1'") or die ($errores .= '<li>Ha ocurrido un error en el servidor</li>');
         echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=busqueda_beca.php?id='.$cv_curso1 = hash('sha512',$cv_curso1).'&busqueda='.$busqueda.' "></META>';

}
if($verifica >= 1){
    
     mysqli_query ($mysqli, "UPDATE inscripciones2 set verificado = 'Verificado' WHERE id = '$cambio1'") or die ($errores .= '<li>Ha ocurrido un error en el servidor</li>');
        // echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=busqueda_beca.php?id='.$cv_curso1 = hash('sha512',$cv_curso1).'&busqueda='.$busqueda.' "></META>';
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=envio_de_correo_becario.php?id='.$cv_curso1 = hash('sha512',$cv_curso1).'&busqueda='.$busqueda.'&token='.$busqueda.'&clave_c1='.$curso1_s.'&claveh_1'.$horario11.'&cv='.$cambio1.'"></META>';
   // echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=busqueda_beca.php?id='.$cv_curso1 = hash('sha512',$cv_curso1).'&busqueda='.$busqueda.' "></META>';
    $confirmacion .= $curp.$curso1_s.$horario11;

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
  <br>
    <br>
    <br>
    <br>
     <h3>&nbsp;<span class="icon-search2"></span> &nbsp;Búsqueda:</h3>
       <div align="right"> <form action="busqueda_beca.php" method="get" class="form_search">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
                    <input type="submit" value="Buscar" class="btn btn-primary">
        </form></div>
    <br>
    <div class="panel panel-default">
    <?php if($_GET['busqueda'] == '')
        {
   // header('Location: perfil_su.php');
           // echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=perfil_su.php"></META>' ;
        }else{
    $consulta_al = "SELECT * FROM inscripciones2 WHERE (curp LIKE '%$busqueda%' or telefono LIKE '%$busqueda%' or celular LIKE '%$busqueda%')";
        $ejecutar2 = $mysqli->query($consulta_al);
        $row_cnt3 = $ejecutar2->fetch_assoc();
 $nombree = $row_cnt3['nombre'];
 $nombree2 = $row_cnt3['nombre2'];
 $apep = $row_cnt3['apellido_p'];
 $apem = $row_cnt3['apellido_m'];
 $telefono_u = $row_cnt3['telefono'];
 $celular_u = $row_cnt3['celular'];
 $dia_u = $row_cnt3['dia'];
 $mes_u = $row_cnt3['mes'];
 $anio_u = $row_cnt3['año'];
 $sexo_u = $row_cnt3['sexo'];
 $curp = $row_cnt3['curp'];
 $correo = $row_cnt3['correo'];
 $direccion = $row_cnt3['direccion'];
 $colonia = $row_cnt3['colonia'];
 $cp = $row_cnt3['cp'];
 $localidad = $row_cnt3['localidad'];
 $municipio = $row_cnt3['municipio'];
 $estado_u = $row_cnt3['estado'];
 $n_estudio = $row_cnt3['n_estudio'];
 $t_sangre = $row_cnt3['t_sangre'];
 $estado_u = $row_cnt3['estado'];
 $s_medico = $row_cnt3['s_medico'];
 $enfermedad = $row_cnt3['enfermedad'];
 $discapacidad = $row_cnt3['discapacidad'];
 $motivo = $row_cnt3['motivo'];
 
}
   ?>
        
        <h3>Datos generales:</h3>
        <br>
        <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nombre completo:&nbsp; <?php echo $nombree.'&nbsp;&nbsp;'.$nombree2.'&nbsp;&nbsp;'.$apep.'&nbsp;&nbsp;'.$apem; ?></th>
      <th scope="col">Fecha de nacimiento: <?php echo $dia_u.'/'.$mes_u.'/'.$anio_u ;?></th>
      <th scope="col">Sexo: <?php echo $sexo_u ;?></th>
      <th scope="col">Curp: <?php echo $curp ;?></th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td scope="row">Telefono: <?php echo $telefono_u ;?></td>
      <td scope="row">Celular: <?php echo $celular_u;?></td>
      <td scope="row">Correo: <?php echo $correo;?></td>
      <td scope="row">Dirección: <?php echo $direccion;?></td>
      <td scope="row"></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td scope="row">Colonia: <?php echo $colonia;?></td>
      <td scope="row">C.P.: <?php echo $cp;?></td>
      <td scope="row">Localidad: <?php echo $localidad;?></td>
      <td scope="row">Municipio: <?php echo $municipio;?></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Estado:<?php echo $estado_u ;?></td>
      <td>Nivel de estudio: <?php echo $n_estudio;?></td>
      <td>Tipo de sangre:<?php echo $t_sangre;?></td>
      <td>Servicio médico:<?php echo $s_medico;?></td>
    </tr>
      <tr>
      <th scope="row"></th>
      <td>Enfermedad:<?php echo $enfermedad ;?></td>
      <td>Discapacidad: <?php echo $discapacidad;?></td>
      <td></td>
      <td></td>
      <!---<td>Motivo:<?php echo $motivo;?></td>
      <td>Servicio médico:<?php echo $s_medico;?></td>-->
    </tr>
  </tbody>
</table>
        <br>
         <?php
  $consulta_list_previa = "SELECT * FROM inscripciones2 WHERE (curp LIKE '%$busqueda%' or telefono LIKE '%$busqueda%' or celular LIKE '%$busqueda%') ";
        $ejecutar = $mysqli->query($consulta_list_previa);
                   // $ejecutar2 = $mysqli->query($consulta_list_previa);
       // $row_cnt = $ejecutar->num_rows;
            
        echo '
            <div "table-responsive">
            <table class="table table-striped">
            <thead>
           <!-- <th>No. &nbsp; &nbsp;</th>-->
            <th>Especialidad &nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>Inscrito a curso</th>
            <th>   </th>
            <th></th>
           <!-- <th>pago</th>-->
          <!--  <th></th>-->
            <th>Validar</th>
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
                    <td>'.$filas[2].'</td>
                    <td>'.$filas[3].'</td>
                    <td><a class="link_delete" href="busqueda_beca.php?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[0].'&c_v='.$filas[0].'&busqueda='.$busqueda.'"><span class="icon-bin" style="color:green"></span></a></td>
<td></td>
                   <!-- <td><a href="#">'.$filas[42].'</a></td>-->
                  <!--  <td><a href="busqueda_beca.php?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[0].'&busqueda='.$busqueda.'&cambio=1"><span class="icon-checkmark2" style="color:green"></a></td>-->
                    <td><a href="#">'.$filas[43].'</a></td>
<td><a href="busqueda_beca.php?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[0].'&busqueda='.$busqueda.'&verifica=1&'.$filas[44].'"><span class="icon-checkmark2" style="color:green"></a></td>
<!-- <td><a class="link_delete" href="inscripciones2.php?id='.$filas[0] = hash('sha512',$filas[0]).'
&cv='.$filas[0].'"><span class="icon-user-add" style="color:green"></span>Ver cursos.</a></td>-->
                    <!--<td>$filas[4]</td>
                    <td>$filas[8]</td>-->
                    </tr>';
                } 
            echo "</tbody></table> </div>";
          ?>
    </div>
  <!--<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        
        <center><h1>Inscripciones Abiertas</h1></center>
    </div>
  </section>-->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          
     <br>
     <br>
     <br>
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