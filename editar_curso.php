<?php session_start();
error_reporting(0);
$sesion1 = $_SESSION['usuario']['t_u'];
$nombre_s_u = $_SESSION['usuario']['nom'];
$apellido_us = $_SESSION['usuario']['ap_p'];
if($sesion1 == ''){
header('Location: index.php');
}
$nombre_s_u = $_SESSION['usuario']['nom'];
require ('./conexion_db_cecati/conexion_cecati.php');
$cv_curso1 = ($_REQUEST['cv']);
$cv_curso2 = ($_REQUEST['cv2']);
$id_2 = ($_REQUEST['id_2']);
$n_especialidad = ($_REQUEST['n_especialidad']);
$elimina = ($_REQUEST['c_v']);

$errores = '';
$confirmacion = '';

$consulta_nc = "SELECT * FROM especialidades WHERE id = $cv_curso1 ";
        $ejecutar_cons = $mysqli->query($consulta_nc);
$r_cons = $ejecutar_cons->fetch_assoc();
          $n_curso = $r_cons['nombre_e'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_curso = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
    $nombre_h = filter_var($_POST['nombre_h'],FILTER_SANITIZE_STRING);
    $inicio = filter_var($_POST['inicio'],FILTER_SANITIZE_STRING);
    $termino = filter_var($_POST['termino'],FILTER_SANITIZE_STRING);
    $precio = filter_var($_POST['precio'],FILTER_SANITIZE_STRING);
    
    $alta_c ="INSERT INTO cursos (id, nombre_c, inicio, termino, precio) VALUES ('$id_curso','$nombre_h','$inicio','$termino','$precio')";
                $alta_c = $mysqli->query($alta_c); 
}
    if($n_especialidad != ''){
    mysqli_query ($mysqli, "UPDATE especialidades set nombre_e = '$n_especialidad' WHERE id = '$cv_curso1'") or die ($errores .= '<li>Ha ocurrido un error en el servidor</li>');
         echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=editar_curso.php?id='.$cv_curso1 = hash('sha512',$cv_curso1).'&cv='.$cv_curso1.' "></META>';

    }
if($elimina != ''){
    mysqli_query($mysqli,"Delete From cursos WHERE id_c = '$elimina'");
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=editar_curso.php?id='.$cv_curso1 = hash('sha512',$cv_curso1).'&cv='.$cv_curso1.' "></META>';

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cecati 72 - EDITAR</title>
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
    
</head>
<body>
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
        <h2>Editar <span class="icon-cogs"></span></h2>
          <h3>Especialidad seleccionada: <?php echo $n_curso;?></h3>
        <p></p>
      </div>
    </div>
       <div align="right"> <form action="busqueda.php" method="get" class="form_search">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
                    <input type="submit" value="Buscar" class="btn btn-primary">
        </form></div>
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
              <h3><strong>Lista (cursos disponibles).</strong></h3>
   <?php
  $consulta_list_previa = "select * FROM cursos where id = $cv_curso1 ORDER BY nombre_c ASC ";
        $ejecuta_r = $mysqli->query($consulta_list_previa);
                   // $ejecutar2 = $mysqli->query($consulta_list_previa);
       // $row_cnt = $ejecutar->num_rows;
            
        echo '
            <div "table-responsive">
            <table class="table table-striped">
            <thead>
            <th>Cursos &nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>&nbsp;</th>
            <th>   </th>
            </thead>
            <tbody>
            </div>';
                //$n = 0;
                while($filas = $ejecuta_r->fetch_row()){
                  //  $id= $filas[0];
                    
                    echo'<tr>
                    <td><a class="link_delete"  style="color:black">'.$filas[2].'</a></td>
                    <td><a class="link_delete" href="editar_curso.php?id='.$filas[1] = hash('sha512',$filas[1]).'
&cv='.$filas[1].'&c_v='.$filas[0].'"><span class="icon-bin" style="color:green"></span></a></td>
                    </tr>
                    <td></td>';
                } 
            echo "</tbody></table> </div>";
          ?>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3><strong>Cambiar nombre</strong></h3>
            <p class="font-italic">
<form  action="editar_curso.php" method="get">
  <div class="form-group">
      <div class="form-group col-md-3" hidden>
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="cv" id="cv" value="<?php echo $cv_curso1;?>">
    </div>
    <label for="inputAddress">Nombre especialidad .</label>
    <input type="text" class="form-control" name="n_especialidad" id="n_especialidad" placeholder="Normbre de especialidad" value="<?php echo $n_curso;?>">
  </div>
  <button type="submit" class="btn btn-primary">Guardar.</button>
</form>
<br><br>
          <h3><strong>Agregar cursos</strong></h3>  
<form  action="" method="post" action="<?php echo htmlspecialchars($_SERVER1['PHP_SELF']); ?>">
  <div class="form-group">
      <div class="form-group col-md-3" hidden>
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="id" id="id" value="<?php echo $cv_curso1;?>">
    </div>
    <label for="inputAddress">Nombre del curso/horario</label>
    <input type="text" class="form-control" name="nombre_h" id="nombre_h" placeholder="Normbre del curso/horario" value="">
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Inicio</label>
      <input type="text" class="form-control" name="inicio" id="inicio" placeholder="Inicio" value="">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Término</label>
      <input type="text" class="form-control" name="termino" id="termino" placeholder="Término" value="">
    </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Precio</label>
      <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" value="">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Guardar.</button>
</form>
           <p> </p>
          </div>
        </div>
      </div>
    </section>
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
         <div class="row">
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