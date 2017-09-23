<?php require_once('Connections/brevete.php'); ?>
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

//obtener el dato
$dato = $_POST['code_certification'];

//cargar los datos anteriores
mysql_select_db($database_brevete, $brevete);
$query_Recordset1 = "SELECT * FROM registro_capacitacion WHERE registro_capacitacion.codigo_certificado=".$_POST['code_certification'];
$Recordset1 = mysql_query($query_Recordset1, $brevete) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$cont = 0;
do{
	if($row_Recordset1['nota']>10){
	$suma_notas_teoria = $suma_notas_teoria+$row_Recordset1['nota'];
	$suma_horas_teoria = $suma_horas_teoria+$row_Recordset1['horas_teoria'];
						$cont++;

	}
		if(!empty($row_Recordset1['nota'])){
		}
	
	
}while($row_Recordset1=mysql_fetch_assoc($Recordset1));
	if($_POST['nota_teoria']>10){
	$suma_notas_teoria = $suma_notas_teoria + $_POST['nota_teoria'];
	$cont = $cont +1 ; //es que le estoy sumando la nota que estoy agregando en le formulario
	$suma_horas_teoria = $suma_horas_teoria + $_POST['horas'];
	}
	$promedio_notas_teoria = $suma_notas_teoria/$cont;

	
$query_insertar_certificado = "UPDATE certificados set horas_teoria= ".$suma_horas_teoria.", prom_teoria = ".$promedio_notas_teoria." where  codigo_certificado = ".$_POST['code_certification'];

mysql_query($query_insertar_certificado) or die(mysql_error());


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO registro_capacitacion (id_curso, nota, curso_inicio, curso_fin, `local`, codigo_certificado,horas_teoria) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cb_curso2'], "int"),
                       GetSQLValueString($_POST['nota_teoria'], "int"),
                       GetSQLValueString($_POST['hora_inicio2'], "date"),
                       GetSQLValueString($_POST['hora_fin2'], "date"),
                       GetSQLValueString($_POST['local'], "text"),
                       GetSQLValueString($_POST['code_certification'], "int"),
                       GetSQLValueString($_POST['horas'], "int"));


  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($insertSQL, $brevete) or die(mysql_error());

  $insertGoTo = "busquedas.php?dato=$dato";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
//}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
