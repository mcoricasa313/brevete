<?php ob_start();?>
<?php require_once('Connections/brevete.php'); ?>
<?php 		require_once("dompdf/dompdf_config.inc.php");
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_brevete, $brevete);
$query_Recordset1 = "SELECT * FROM certificados a, postulantes b, tramite c WHERE a.postulante=b.num_documento and b.id_tramite=c.id_tramite;";
$Recordset1 = mysql_query($query_Recordset1, $brevete) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php

		date_default_timezone_set("America/Lima");
$fecha_actual = date("d-m-y")."";
$hora_actual = date("H:i:s");


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<p align="left">Fecha: '.$fecha_actual.'</p>
<p align="left">Hora: '.$hora_actual.'</p>
<h1 align="center"><strong style="font-family: Arial, Helvetica, sans-serif">REPORTE DE CERTIFICADOS</strong></h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  
  <tr bgcolor="red">
    <td bgcolor="#87CEEB" style="font-family: Arial, Helvetica, sans-serif"><strong>COD_CERTIFICADO</strong></td>
    <td bgcolor="#87CEEB" style="font-family: Arial, Helvetica, sans-serif"><strong>POSTULANTE</strong></td>
    <td bgcolor="#87CEEB" style="font-family: Arial, Helvetica, sans-serif"><strong>TRAMITE</strong></td>
    <td bgcolor="#87CEEB" style="font-family: Arial, Helvetica, sans-serif"><strong>ESTADO</strong></td>
  </tr>';
  ?>
<?php   do {?>
<?php
   $codigoHTML.='<tr bgcolor="red">
      <td bgcolor="#FFFFFF" style="font-family: Arial, Helvetica, sans-serif">'.$row_Recordset1["codigo_certificado"].'</td>
      <td bgcolor="#FFFFFF" style="font-family: Arial, Helvetica, sans-serif">'.$row_Recordset1['nom_postulante'].'</td>
      <td bgcolor="#FFFFFF" style="font-family: Arial, Helvetica, sans-serif">'.$row_Recordset1['nombre'].'</td>
      <td bgcolor="#FFFFFF" style="font-family: Arial, Helvetica, sans-serif">'.$row_Recordset1['estado'].'</td>
    </tr>';?>
<?php    } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));?>
  

<?php
$codigoHTML.='
</table>
</body>
</html>';
?>
<?php
mysql_free_result($Recordset1);
?>
<?php
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla_usuarios.pdf");
?>
<?php ob_end_flush();?>
