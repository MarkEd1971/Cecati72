<?php session_start();
require ('./conexion_db_cecati/conexion_cecati.php');
require('./MPDF57/mpdf.php');
$curp = ($_REQUEST['us']);
 $uss = ($_REQUEST['token']);
 $estado = ($_REQUEST['status']);
 //$curp = ($_REQUEST['token']);
$curso1_s = ($_REQUEST['clave_c1']);
$horario11 = ($_REQUEST['claveh_1']);
$curso2_s = ($_REQUEST['clave_c2']);
$horario12 = ($_REQUEST['claveh_2']);
if($uss =='' or $curp == ''){
      //  echo '<META HTTP-EQUIV="Refresh" CONTENT="0.5; URL=index.php"></META>';

}
/*
$nombre = $_SESSION['usuario']['nombre'];
$apellido_p = $_SESSION['usuario']['apellido_p'];

///////////////////////////////////////////////////////
 $no_control = ($_REQUEST['matricula']);
 $nombre = ($_REQUEST['nombre']);
 $nombre2 = ($_REQUEST['nombre2']);
 $apellido_p = ($_REQUEST['apellido_p']);
 $apellido_m = ($_REQUEST['apellido_m']);
 $carrera1 = ($_REQUEST['carrera']);
// $cv_t = ($_REQUEST['cv_t'])*/
///////////////////////////////////////////////////////
 $consulta_n_c1 = "SELECT * FROM cursos WHERE id_c = $horario12 ";
        $ejecutar_cons_c1 = $mysqli->query($consulta_n_c1);
$r_cons_c1 = $ejecutar_cons_c1->fetch_assoc();
          $n_curso1 = $r_cons_c1['nombre_c'];
              $precio_c1 = $r_cons_c1['precio'];

///////////////////////////////////////////////////////
$consulta_us = "SELECT * FROM inscripciones where curp = '$uss' and curso_h = '$n_curso1'";
        $ejecutar1 = $mysqli->query($consulta_us);
        $edo = $ejecutar1->fetch_assoc();
 $nombre_al = $edo['nombre'];
 $nombre_al2 = $edo['nombre2'];
 $apellido_p = $edo['apellido_p'];
 $apellido_m = $edo['apellido_m'];
 $curso_h = $edo['curso_h'];
 $direccion = $edo['direccion'];
 $colonia = $edo['colonia'];
 $localidad = $edo['localidad'];
 $estado2 = $edo['estado'];
 $precio = '';
///////////////////////////////////////////////////////
/*$consulta_desarrollo = "SELECT * FROM usuarios where d_a = '3'";
      $ejecutar_d = $mysqli->query($consulta_desarrollo);
     $edo_d = $ejecutar_d->fetch_assoc();
$nombre_d = $edo_d['nombre'];
$nombre2_d = $edo_d['nombre2'];
$apellido_p_d = $edo_d['apellido_p'];
$apellido_m_d = $edo_d['apellido_m'];
$abreviatura = $edo_d['abreviatura_p'];

///////////////////////////////////////////////////////
$consulta_proyecto = "SELECT * FROM t_cursos where no_control = '$no_control' AND cv_proyectos = '6'";
        $ejecutar_1 = $mysqli->query($consulta_proyecto);
        $edo1 = $ejecutar_1->fetch_assoc();
 $nombre_proyecto = $edo1['nombre_proyecto'];
///////////////////////////////////////////////////////
$fecha_actual=strftime("%m");
$year_actual=strftime("%Y");
$dia_actual=strftime("%d");

if($fecha_actual == 1){
    $fecha = 'Enero';
}else{
if($fecha_actual == 2){
    $fecha = 'Febrero';
}else{
if($fecha_actual == 3){
    $fecha = 'Marzo';
}else{
if($fecha_actual == 4){
    $fecha = 'Abril';
}else{
if($fecha_actual == 5){
    $fecha = 'Mayo';
}else{
if($fecha_actual == 6){
    $fecha = 'Junio';
}else{
if($fecha_actual == 7){
    $fecha = 'Julio';
}else{
if($fecha_actual == 8){
    $fecha = 'Agosto';
}else{
if($fecha_actual == 9){
    $fecha = 'Septiembre';
}else{
if($fecha_actual == 10){
    $fecha = 'Octubre';
}else{
if($fecha_actual == 11){
    $fecha = 'Noviembre';
}else{
if($fecha_actual == 12){
    $fecha = 'Diciembre';
}
}
}
}
}
}
}
}
}
}
}
}*/
///////////////////////////////////////////////////////
function encadenar($nespacios){ 
  for($i=0;$i<$nespacios;$i++){ 
    $espacios = $espacios . "&nbsp;";//voy sumando espacios... 
  } 
  return $espacios;//devuelvo la cadena con todos los espacios 
} 
$html ='
<style>
img {
	max-width: 100%;
    repeat: no-repeat;
    attachment: fixed;
    position: center;
   /* background:#FFFFFF;*/
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
body{
 /* background-image: url(./assets/img/arancel.png); 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-max-width:45%;
  background-position: center; */
 }
</style>
<head>
  <meta charset="utf-8">
</head>
 
<body>
<picture>
<img src="./assets/img/head_arancel.png">
    </picture>
<table>
  <tr>
    <td><p><strong>DATOS DE LA CUENTA BANCARIA:</strong></p>
<p>Nombre del banco: BANORTE</p>
<p>Número de cuenta: 0149595904</p>
<p>Nombre o razón social:</p>
<p>SEP DIRECCIÓN GENERAL DE CENTROS</p>
<p>DE FORMACIÓN PARA EL TRABAJO.</p></td>
    <td valign="top"><p><strong> MONTO A PAGAR:</strong></p>
    <p>$ 200.00</p>
    <p>(Docientos pesos 00/100 M.N.)</p></td>
  </tr>
  <tr>
  <td valign="top"><p><strong>Datos del estudiante:</strong></p>
  <h5>Apellido paterno: '.$apellido_p.'</h5>
  <h5>Apellido materno: '.$apellido_m.'</h5>
  <h5>Nombre(s): '.$nombre_al.' '.$nombre_al2.'</h5>
  <h5>CURP: '.$uss.'</h5>
  <h5>Domicilio: '.$direccion.'&nbsp;Colonia:'.$colonia.'&nbsp;Localidad:'.$localidad.'&nbsp;Estado:'.$estado2.'</h5>
  <h5>Curso al que me inscribo: '.$curso_h.'</h5>
  </td>  
  </tr>
  <tr>
    <td valign="top">
    <p><strong> Realice el pago del servicio en:</strong></p>
<h5>• Sucursal Banorte</h5>
<h5>• Farmacia Guadalajara</h5>
<h5>• Oficina TELECOMM</h5><br>
<p><strong>Para transferencia bancaria:</strong></p><br>
<h5><strong>1. DAR DE ALTA EN LOS DATOS DEL CECATI 72 PARA TRANSFERENCIA BANCARIA</strong></h5><br>
<h6>RAZON SOCIAL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	SEP/DGCFT/CECATI No 72 </h6>
<h6>R.F.C.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEP210905778</h6>
<h6>BANCO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BANCO MERCANTIL DEL NORTE, S.A. (Banorte)</h6>
<h6>CLABE INTERBANCARIA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;072 877 00149595904 9</h6>
<h6>CUENTA :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0149595904</h6>
<h6>CONTACTO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CECATI 72</h6>
<h6>TELEFONO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;922 22 103 83</h6>
<h6>CORREO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cecati_72@hotmail.com</h6><br>
<h5><strong>2. REALIZA LA TRANSFERENCIA BANCARIA A LA CUENTA DEL CECATI 72 CON LOS SIGUIENTES DATOS</strong></h5>
<h6>AL REALIZAR LA TRANSFERENCIA SE LE COLOCARA EN EL</h6><br>
<h6>NUMERO DE REFERENCIA: 72</h6>
<h6><em>PROPOSITO DE LA TRANSFERENCIA:</em> &nbsp; INSCRIPCION Y LA CURP DEL ALUMNO.</h6><br>
<h6>EJEMPLO:</h6>
<h4>INSCRIPCION MECM001120MVZNDR04</h4>
</td>
    <td valign="top"><p><strong> Enviar un correo a:</strong>
    </p>
    <br>
    <strong>
    <p>cecati72.ac1@dgcft.sems.gob.mx</p>
    <br>
    <p>Con el asunto:</p><br>
    <p>INSCRIPCION A CURSO</p><br>
    <p>Adjuntando:</p>
    <br>
    <p>• Formato de arancel.</p>
    <p>• Comprobante de pago escaneado </p>
    <p>• CURP en PDF descargado del sitio web <a href="https://www.gob.mx/curp/">https://www.gob.mx/curp/</a></p>
    <p>• Una foto selfie de su rostro sin sombrero, gorra, maquillaje ni factor de embellecimiento.</p></strong>
    <br>
   <!-- <picture style="
    position: center;">
<img src="./assets/img/pie_arancel.png" style="max-width: 30%;">
    </picture>-->
    </td>
  </tr>
</table>
</body>';
   
    /*
      <script>
   // window.setTimeout(function() {
   // $(".alert").fadeTo(5000, 0).slideUp(500, function(){
   //     $(this).remove(); 
   // });
//}, 4000);</script>
    <script src="./js/menu.js"></script>
</body>
</html>*/
$mpdf = new mPDF([
    'mode' => 'utf-8',
    'format' => [190, 236],
    'orientation' => 'L'
]);
/*$mpdf = new mPDF('c', 'A4');*/
//$css = file_get_contents('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css');
//$mpdf->writeHTML($css, 1);
$mpdf->writeHTML($html);
$mpdf->Output('arancel_de_pago.pdf', 'I');
    ?>