<?php
require ('./conexion_db_cecati/conexion_cecati.php');

//$correo = filter_var($_POST['correo'],FILTER_SANITIZE_STRING);
 $id = ($_REQUEST['id']);
 $curp = ($_REQUEST['token']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario11 = ($_REQUEST['claveh_1']);
$curso2_s = ($_REQUEST['clave_c2']);
$horario12 = ($_REQUEST['claveh_2']);

$cons_correo = "Select * from inscripciones2 where curp = '$curp'";
$cons_conect = $mysqli->query($cons_correo);
$res_conect = $cons_conect->fetch_assoc();
$correo = $res_conect['correo'];
$nombre_u = $res_conect['nombre'];
$apellido_u = $res_conect['apellido_p'];
$id = $res_conect['id'];

/*if($clave_t != ''){
    $usuario = $clave_t;
}else{
    if($matricula != ''){
        $usuario = $matricula;
    }
}*/

echo $curp ;

$usuario = $id;
 $uss = hash('sha512',$usuario);

if($res_conect != ''){
//$url = 'http://'.$_SERVER["cecati72.com.mx/"].'cecati72.com.mx/reporte_p1.php?us='.$uss.'&token='.$curp.'&clave_c2='.$curso2_s.'&claveh_2='.$horario12;

$cuerpo = 'Hola '.$nombre_u.' '.$apellido_u.' 
';
$cuerpo .='Solicitud de exención de pago - Convenio.
';
$cuerpo .= 'Esta solicitud aplica para las personas que se encuentra en los acuerdos siguientes (Cosoleacaque, Cetis 72, CBtis 213, ITESCO, Tenologico de Minatitlan, Promocion de 2 por 1 y medio, Iglesia de Jesucristo) 

Deberá enviar credencial INE escaneada ambos lados, comprobante de domicilio (luz, agua, CFE, Telmex, IZZI) con antigüedad no mayor a tres meses, CURP en formato PDF y foto selfie al correo cecati72.avsp2@dgcft.sems.gob.mx 
Solicitantes de 15 a 17 años enviar credencial INE escaneada ambos lados de padre, madre o tutor , comprobante de domicilio (luz, agua, CFE, Telmex, IZZI) con antigüedad no mayor a tres meses, CURP en formato PDF y foto selfie al correo cecati72.avsp2@dgcft.sems.gob.mx 
La respuesta a esta solicitud se dará al siguiente día hábil de enviada. 
.';
//$cuerpo .='Para proceder, por favor de clic en el siguiente enlace: '.$url.'';
$cabecera ='To: <'.$correo.'>';

    
    
if(mail($correo,'Correo: Solicitud de beca',$cuerpo, $cabecera))
{
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=index.php?res=true"></META>';
}
else{
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=index.php?res=error"></META>';
}
}else{
  $mensaje = $errores .= '<li>El correo no existe.</li>';

    echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=index.php?res=false"></META>';
}
?>
