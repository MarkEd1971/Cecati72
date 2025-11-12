<?php
require ('./conexion_db_cecati/conexion_cecati.php');

//$correo = filter_var($_POST['correo'],FILTER_SANITIZE_STRING);
$cv_curso = ($_REQUEST['cv']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario11 = ($_REQUEST['claveh_1']);
$curso2_s = ($_REQUEST['clave_c2']);
$horario12 = ($_REQUEST['claveh_2']);
$alum_no = ($_REQUEST['token']);
$id_clave = ($_REQUEST['id']);
$id_c = ($_REQUEST['id_c']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

       $correo = mysqli_real_escape_string($mysqli,$_POST['buscar']);
       $cv = mysqli_real_escape_string($mysqli,$_POST['cv']);
    

   $sqlconsulta = "SELECT * FROM inscripciones WHERE correo = '$correo'";
		$result=$mysqli->query($sqlconsulta);
		$rows = $result->num_rows;
		
		if($rows >= 1) {
            
			$row = $result->fetch_assoc();
           $curp = $row['curp'];
            
           // $id = $curp;
 $uss = hash('sha512',$curp);
            
            if($cv == ''){
               echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=seleccion_e_r.php?id='.$uss.'&token='.$curp.'"></META>';
            }else {
                 echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=seleccion_horario_r.php?id='.$uss.'&token='.$curp.'&cv='.$cv.'"></META>';
            }
//			 echo $cv ; 
			} else {
            
          //  echo 'No te encontramos en el sistema, por favor registrate para poder inscribirte a un curso';
             echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=index.php?id='.$uss.'&error=1"></META>';
		} 
     }
//echo 'se muestra este mensaje de prueba';
?>
