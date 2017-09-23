<?php require_once('Connections/brevete.php'); ?>
<?php
		require_once("dompdf/dompdf_config.inc.php");
		//include("css/estilos.css");
		//$conexion=mysql_connect("localhost","root","");
		//mysql_select_db("ejemplo_pdf",$conexion);

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Documento sin título</title>


<style type="text/css">
body {
	background-color: #FFF;
}
</style>
</head>
<body>
<span style="color: #000000">Fecha: date("d/m/Y")
</span><br />
<span style="color: #000000">Hora: <?php echo date("H:i:s");?></span><br />
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#C5E7F5" class="tabla_celeste">
  <tr>
    <td colspan="6" bgcolor="#C5E7F5" style="color: #000;font:Arial"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="skyblue">
    <td align="center" bgcolor="#C5E7F5" style="color: #000;font:Arial"><strong>ID_AUDITORIA</strong></td>
    <td align="center" bgcolor="#C5E7F5" style="color: #000;font:Arial"><strong>FECHA INGRESO</strong></td>
    <td align="center" bgcolor="#C5E7F5" style="color: #000;font:Arial"><strong>HORA DE INGRESO</strong></td>
    <td align="center" bgcolor="#C5E7F5" style="color: #000;font:Arial"><strong>FECHA DE SALIDA</strong></td>
    <td align="center" bgcolor="#C5E7F5" style="color: #000;font:Arial"><strong>HORA DE SALIDA</strong></td>
    <td align="center" bgcolor="#C5E7F5" style="color: #000;font:Arial"><strong>USUARIO</strong></td>
  </tr>';
  

mysql_select_db($database_brevete, $brevete);
$sql=mysql_query("select * from auditoria");
while($res=mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr class="parrafo_negro_pequeno">
		<td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">'.$res['id_auditoria'].'</td>
		<td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">'.$res['fe_ingreso'].'</td>
		<td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">'.$res['mt_horaingreso'].'</td>
		<td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">'.$res['fe_salida'].'</td>
		<td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">'.$res['mt_horasalida'].'</td>
		<td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">'.$res['st_ingreso'].'</td>										
	</tr>';
	
}
$codigoHTML.= '
</table>
<span class="body_fondo"></span><span class="body_fondo"></span><span class="body_fondo"></span>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla_auditoria.pdf");
?>