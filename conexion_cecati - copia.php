<?php

$mysqli = new mysqli("sql5c75f.carrierzone.com","cecati72co935589","MUYZCWUQT19V","phpmy1_cecati72_com_mx"); 
	
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