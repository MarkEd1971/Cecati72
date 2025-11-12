<?php session_start();
require ('./conexion_db_cecati/conexion_cecati.php');
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;filename=Reporte_alumnos_registrados.xls");
$cv_curso1 = ($_REQUEST['cv']);
$consulta_nc = "SELECT * FROM especialidades WHERE id = $cv_curso1";
        $ejecutar_cons = $mysqli->query($consulta_nc);
$r_cons = $ejecutar_cons->fetch_assoc();
          $n_curso = $r_cons['nombre_e'];
 ?>
<!DOCTYPE html>
<html>
<head>
<!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/fonts.css">
    <script src="js/jquery-3.3.1.min.js"></script>-->	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class="container">	
	<h3 class='center'>ALUMNOS REGISTRADOS EN: <?php echo $n_curso;?></h3>
						<div "table-responsive">
            <table class="table table-striped" border="1">
						<thead>
							<tr>
                                <th>Especialidad</th>
								<th>Curso</th>
								<th>Nombre completo</th>
								<th>CORREO</th>
								<th>Fecha de nacimiento</th>
								<th>Estado civil</th>
                                <th>CURP</th>
                                <th>Nacionalidad</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th>Colonia</th>
                                <th>Localidad</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                                <th>C.P.</th>
                                <th>Nivel de estudio</th>
                                <th>Tipo de sangre</th>
                                <th>Servicio medico</th>
                                <th>Enfermedad</th>
                                <th>Discapacidad</th>
                                <th>Motivo de capacitación</th>
                                <th>Medio en que se enteró</th>
                                <th>Informacion socioeconómica</th>
                                <th>Personas que contrubuyen a mantener la casa donde vive</th>
                                <th>Estimación de ingreso mensual</th>
                                <th>Nombre de la empresa en la que trabaja</th>
                                <th>Puesto de trabajo</th>
                                <th>Tiempo de antigüedad en el trabajo</th>
                                <th>Dirección de la empresa</th>
                                <th>Teléfono de la empresa</th>
                                <th>Bienes con los que cuenta</th>
                                <th>Fecha</th>
                                <th>Hora</th>
							</tr>
						</thead>
						<tbody>			
		<?php 			
			error_reporting(0);
			session_start();
				$sql = "SELECT * FROM inscripciones WHERE especialidad = '$n_curso' and especialidad != '' and curso_h != ''";
				$ejecutar = $mysqli->query($sql);

				while($filas = $ejecutar->fetch_row()){
					echo '<tr>
                            <td>'.$filas[2].'</td>
							<td>'.$filas[3].'</td>
						  	<td>'.$filas[11].' '.$filas[12].' '.$filas[13].' '.$filas[14].'</td>
						  	<td>'.$filas[17].'</td>
						  	<td>'.$filas[4].'/'.$filas[5].'/'.$filas[6].'</td>
						  	<td>'.$filas[8].'</td>
                            <td><a href="http://'.$_SERVER["cecati72.com.mx/"].'cecati72.com.mx/busqueda.php?su=1&busqueda='.$filas[9].'">'.$filas[9].'</a></td>
                            <td>'.$filas[10].'</td>
                            <td>'.$filas[15].'</td>
                            <td>'.$filas[16].'</td>
                            <td>'.$filas[18].'</td>
                            <td>'.$filas[19].'</td>
                            <td>'.$filas[21].'</td>
                            <td>'.$filas[22].'</td>
                            <td>'.$filas[23].'</td>
                            <td>'.$filas[20].'</td>
                            <td>'.$filas[24].'</td>
                            <td>'.$filas[25].'</td>
                            <td>'.$filas[26].'</td>
                            <td>'.$filas[27].'</td>
                            <td>'.$filas[28].'</td>
                            <td>'.$filas[29].'</td>
                            <td>'.$filas[30].'</td>
                            <td>'.$filas[31].'</td>
                            <td>'.$filas[32].'</td>
                            <td>'.$filas[33].'</td>
                            <td>'.$filas[34].'</td>
                            <td>'.$filas[35].'</td>
                            <td>'.$filas[36].'</td>
                            <td>'.$filas[37].'</td>
                            <td>'.$filas[38].'</td>
                            <td>'.$filas[39].'</td>
                            <td>'.$filas[40].'</td>
                            <td>'.$filas[41].'</td>
						  </tr>';
				}
				 ?>	
						</tbody>
					</table>				
        </div>
	</div>
</body>
</html>
        