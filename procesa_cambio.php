<?php
require ('./conexion_db_cecati/conexion_cecati.php');

 $pass1 = ($_REQUEST['pwlogin']);
 $pass2 = ($_REQUEST['pwlogin2']);
 $usuario = ($_REQUEST['a']);
 $user = hash('sha512',$usuario);
 $password = hash('sha512',$pass1);


if($pass1 != $pass2){
 echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=cambiar_contrasena.php?us='.$user.'&token='.$usuario.'&status=false"></META>';

}else{

/*mysqli_query ($mysqli, "UPDATE usuarios set pw = '$password' WHERE pw = '$usuario'") or die ($errores .= '<li>Ha ocurrido un error en el servidor</li>');*/

mysqli_query ($mysqli, "UPDATE usuarios set pw = '$password' WHERE id = '$usuario'") or die ($errores .= '<li>Ha ocurrido un error en el servidor</li>');


 echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=cambiar_contrasena.php?us='.$user.'&token='.$usuario.'&status=true"></META>';
}

?>