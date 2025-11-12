<?php
require ('./conexion_db_cecati/conexion_cecati.php');

$correo = filter_var($_POST['correo'],FILTER_SANITIZE_STRING);
$id = filter_var($_POST['id'],FILTER_SANITIZE_STRING);
$cv = filter_var($_POST['cv'],FILTER_SANITIZE_STRING);
$id_c = filter_var($_POST['id_c'],FILTER_SANITIZE_STRING);
/*
$cons_correo = "Select * from usuarios where correo = '$correo'";
$cons_conect = $mysqli->query($cons_correo);
$res_conect = $cons_conect->fetch_assoc();
$res_correo = $res_conect['correo'];
$nombre_u = $res_conect['nom'];
$apellido_u = $res_conect['ap_p'];
$id = $res_conect['id'];*/
//$clave_t = $res_conect['cv_t'];
//$matricula = $res_conect['no_control'];

/*if($clave_t != ''){
    $usuario = $clave_t;
}else{
    if($matricula != ''){
        $usuario = $matricula;
    }
}*/

$usuario = $id;
 $uss = hash('sha512',$usuario);

if($id == ''){
    $id = hash('sha512',$correo);
}
//echo $id;

if($correo != ''){
$url = 'http://'.$_SERVER["cecati72.com.mx/"].'cecati72.com.mx/registro.php?id='.$id.'&r_correo='.$correo.'&cv='.$cv.'&id_c='.$id_c;

$cuerpo = 'Se ha recibido una solicitud de verificacion de correo electronico.<br>';
$cuerpo .='Para proceder con el registro a Cecati 72, por favor de clic en el siguiente enlace: '.$url.'';
$cabecera ='To: <'.$correo.'>';

if(mail($correo,'Correo: Verificacion de correo electronico.',$cuerpo, $cabecera))
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