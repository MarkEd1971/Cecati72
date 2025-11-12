<?php
require ('./conexion_db_cecati/conexion_cecati.php');

//$correo = filter_var($_POST['correo'],FILTER_SANITIZE_STRING);
 $id = ($_REQUEST['id']);
 $curp = ($_REQUEST['token']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario11 = ($_REQUEST['claveh_1']);
$curso2_s = ($_REQUEST['clave_c2']);
$horario12 = ($_REQUEST['claveh_2']);

$cons_correo = "Select * from inscripciones where curp = '$curp'";
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

if($curso2_s != ''){
    $enviar = '&correo=1';
}
$usuario = $id;
 $uss = hash('sha512',$usuario);

if($res_conect != ''){
$url = 'http://'.$_SERVER["cecati72.com.mx/"].'cecati72.com.mx/reporte_p.php?us='.$uss.'&token='.$curp.'&clave_c1='.$curso1_s.'&claveh_1='.$horario11;
    
$cuerpo = 'Hola '.$nombre_u.' '.$apellido_u.'. El arancel de pago ya se encuentra disponible.';
$cuerpo .='Para proceder, por favor de clic en el siguiente enlace: '.$url.'';
$cabecera ='To: <'.$correo.'>';

if(mail($correo,'Correo: Arancel de pago',$cuerpo, $cabecera))
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
