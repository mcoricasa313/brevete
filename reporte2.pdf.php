<?php require_once('Connections/brevete.php'); ?>
<?php
		require_once("dompdf/dompdf_config.inc.php");
		
if(isset($_GET['dato'])){$dato=$_GET['dato'];}
$query= "SELECT * FROM certificados a, postulantes b, tramite c WHERE a.postulante=b.num_documento and b.id_tramite=c.id_tramite and codigo_certificado=".$dato;
mysql_select_db($database_brevete, $brevete);

$resultset = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($resultset);
date_default_timezone_set("America/Lima");
$fecha_actual = date("d-m-y")."";

$query_actualizar = "UPDATE certificados set estado = 'F' where codigo_certificado=".$dato;
mysql_select_db($database_brevete, $brevete);

mysql_query($query_actualizar) or die(mysql_error());

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><img src="images/mtc.jpg" width="372" height="74" /><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="50" colspan="3" align="center"><span style="font-weight: bold">CERTIFICADO DE PROFESIONALIZACION DEL CONDUCTOR</span></td>
        </tr>
        <tr>
          <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <td>Se expide el presente certificado a <a style="color:black; font-weight: bold;">'.$row['nom_postulante'].'</a> <br />
                Identificado con DNI N <span style="font-weight: bold"> '.$row['num_documento'].'</span> tras haber aprobado el Curso de Profesionalizacion para la obtencion la Licencia de Conducir <span style="font-weight: bold">'.$row['nombre'].' </span>de conformidad con lo establecido por el Reglamento Nacional de Licencias de Conducir vehiculos automotores y no motorizados de transportes terrestres aprobado por Decreto Supremo 040-2008-MTC.</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="28%" align="center"><table width="64%" border="0" cellspacing="0" cellpadding="8" align="center">
            <tr>
              <td align="center"><table width="100" border="1" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><br />
                    <br />
                    <br />
                    <br />
                    <br /></td>
                </tr>
              </table>
                <br />
                Huella Digital</td>
            </tr>
          </table></td>
          <td width="31%" align="center" valign="top"><br />
          <br />
          <br />
          <br />
          <br />
          <br />
          _______________________<br />
          '.$row['nom_postulante'].'          <br /></td>
          <td width="41%" align="center"><br />
          <br />
          <br />
          <br />
          <br />
          <br />
          _________________________<br />          
          Director<br /></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td align="center" valign="top">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <td>Escuela de Conductores autorizadas para funcionar por Resolucion Directoral N RD :N 3708-2013-MTC/15</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <td width="63%" style="font-weight: bold">Direccion de la Escuela de Conductores</td>
              <td width="37%" align="right" style="font-weight: bold">Fecha de Expedicion: '.$fecha_actual.'</td>
            </tr>
          </table></td>
        </tr>
      </table>      <br /></td>
  </tr>
<br />
<br />
<br />
<br />';

  $codigoHTML.='</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla_usuarios.pdf");
?>