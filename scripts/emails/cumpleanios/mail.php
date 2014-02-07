<?php

require_once 'db/socios_im.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

$hoy = date("m-d");
$fecha = split('-', $hoy);
$dia = $fecha[1];
$mes = $fecha[0];

$sociosModel = new SociosModel();
$sociosBirth = $sociosModel->getSociosByBirth($hoy);

if (empty($sociosBirth)) {
    echo "Nadie cumple años hoy ({$hoy})\n";
    exit;
}

$meses = array(
    '01' => 'Enero',
    '02' => 'Febrero',
    '03' => 'Marzo',
    '04' => 'Abril',
    '05' => 'Mayo',
    '06' => 'Junio',
    '07' => 'Julio',
    '08' => 'Agosto',
    '09' => 'Septiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre',
);

$nombreMes = $meses[$mes];

$titulo = 'Cumpleaños del ';
$titulo .= ltrim($dia, '0');
$titulo .= ' de ';
$titulo .= $nombreMes;

// message
$mensaje = '
<div style="background: #d1d1d1; padding: 20px;">

<table style="width:600px;margin:0 auto;background:#fff;font-family: Arial, Helvetica, sans-serif;" width="600" border="0">

  <tr>
    <td align="center" style="padding: 15px 0 0;"><img src="http://independientemistico.org/wp-content/uploads/2013/12/IM-Web.png" alt="IM" width="250" height="170" /></td>
  </tr>
  
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  
  <tr style="background: #d8242f;">
    <td height="60" align="center"><p style="font-size: 30px; font-weight:bold;color: #fff;">&iexcl;Feliz Cumplea&ntilde;os!';

foreach ($sociosBirth as $socioBirth) {
    $nombre = $socioBirth['nombre'] . " " . $socioBirth['apellido'];
    echo "Hoy ({$hoy}) cumple $nombre\n";
    $mensaje .= '<br>' . $nombre;
}

$mensaje .= '</p></td>
  </tr>
  
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="center">
    	<p style="font-size: 25px; font-weight:bold;color: #d8242f;">Te desea Independiente M&iacute;stico</p>
    	<p style="font-size: 19px; font-weight:bold;color: #666666;">&iexcl;Esperamos que pases un excelente d&iacute;a!</p>
    </td>
  </tr>
    
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  
  <tr style="background: #959595;">
    <td height="40" align="center">
    	<a style="font-size: 16px; letter-spacing:1px; font-weight:normal;color: #fff;text-decoration: none;" href="http://www.independientemistico.org/">www.independientemistico.org</a>
    </td>
  </tr>  
  
</table>
</div>
';

// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: German <german.scoglio@gmail.com>' . "\r\n";
$cabeceras .= 'From: Independiente Mistico <contacto@independientemistico.org>' . "\r\n";

// Send
mail('german.scoglio@gmail.com', $titulo, $mensaje, $cabeceras);