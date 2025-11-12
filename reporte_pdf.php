<?php 
//	include('config/conexion.php');
	/*require_once("dompdf/autoload.inc.php");	
	require_once 'dompdf/lib/html5lib/Parser.php';
	require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
	require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
	require_once 'dompdf/src/Autoloader.php';
	Dompdf\Autoloader::register();
	session_start();
				
$codigoHTML ='<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/materialize.css">
	
</head>
<body class="">
	<div class="container">	
	 

						<h2>hola xd</h2>
	
          					
	</div>
</body>
</html>';


//reference the Dompdf namespace

use Dompdf\Dompdf;

$codigoHTML=utf8_encode($codigoHTML);
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($codigoHTML);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
//Cambiando la fuente
$dompdf->set_option('defaultFont', 'Courier');
$dompdf->set_option("isPhpEnabled", true);


// Convertir the HTML as PDF
$dompdf->render();
// Descargar el PDF generado
$dompdf->stream("Reporte_usuarios.pdf");*/

if(!empty($_GET['pdf'])){
    $fileName = basename($_GET['pdf']);
    $filePath = 'pdf/'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}

 ?>
        