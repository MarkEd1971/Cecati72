<?php

$mysqli = new mysqli("sql5c75f.carrierzone.com","cecati72co908870","Ugm20227","prueba2022_cecati72co908870"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
/* change character set to utf8 */
    if (!$mysqli->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $mysqli->error);
    } else {
        printf("", $mysqli->character_set_name());
    }

?>