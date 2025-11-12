<?php
$borrarFor = ($_REQUEST['fichero']);
@unlink('assets/img/banner/'.$borrarFor);
 echo '<META HTTP-EQUIV="Refresh" CONTENT="0.2; URL=cambiar_banner.php"></META>';
?>