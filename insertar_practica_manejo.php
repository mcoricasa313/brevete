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
$dato = $_POST['code_certification'];
mysql_select_db($database_brevete, $brevete);

$query_Recordset1 = "SELECT * FROM registro_practicas WHERE registro_practicas.codigo_certificado =".$_POST['code_certification'];
$Recordset1 = mysql_query($query_Recordset1, $brevete) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//actualizar las horas y las notas de la tabla certificado
$suma_horas = 0 ;
$suma_notas = 0 ;
$contador=0;
do {
	if($row_Recordset1['nota']>10){
		$suma_horas = $suma_horas + $row_Recordset1['horas'];
		$suma_notas = $suma_notas + $row_Recordset1['nota'];
		$contador++;
	}
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));

if($_POST['nota_practicas']>10){
	
$suma_horas = $suma_horas + $_POST['hora_practicas'];
$suma_notas = $suma_notas + $_POST['nota_practicas'];
		$contador++;
	}
$promedio_notas = $suma_notas /($contador);


$query_update = "UPDATE certificados set horas_practica= ".$suma_horas.", prom_practicas = ".$promedio_notas." where  codigo_certificado = ".$_POST['code_certification'];

mysql_query($query_update);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO registro_practicas (horas, nota, fecha, codigo_certificado) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['hora_practicas'], "text"),
                       GetSQLValueString($_POST['nota_practicas'], "text"),
                       GetSQLValueString($_POST['fecha_practicas'], "date"),
                       GetSQLValueString($_POST['code_certification'], "int"));

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

<div class="box" id="box">
  <h1>Agregar Practica de Manejo </h1>
  <form id="form3" name="form3" method="POST" action="<?php echo $editFormAction; ?>">
    <br />
    <table width="900" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="135" class="parrafo_negro">Codigo</td>
        <td width="239"><label for=""></label>
          <span id="sprytextfield1">
            <input type="text" readonly="readonly" />
          </span></td>
        <td width="174" class="parrafo_negro">Local</td>
        <td width="228"><div spry:region="ds1">
          <select name="local2" id="local2" spry:repeatchildren="ds1">
            <option value="{Local}" selected="selected">{Local}</option>
          </select>
        </div></td>
        <td width="74">&nbsp;</td>
      </tr>
      <tr>
        <td class="parrafo_negro">Horas</td>
        <td><label for="hora_practicas"></label>
          <input type="number" name="hora_practicas" id="hora_practicas" /></td>
        <td class="parrafo_negro">Fecha</td>
        <td><label for="fecha_practicas"></label>
          <input type="date" name="fecha_practicas" id="fecha_practicas" />
          <label for="select"></label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="parrafo_negro">Notas</td>
        <td><label for="nota_practicas"></label>
          <input type="number" name="nota_practicas" id="nota_practicas" /></td>
        <td>Codigo Certificado</td>
        <td><input type="hidden" name="code_certification" id="code_certification" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="parrafo_negro"><input type="submit" name="button3" id="button3" value="Grabar" />
          <input type="reset" name="button6" id="button6" value="Limpiar" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form3" />
    <br />
    <br />
    <!--
    <table width="50%" border="0" cellspacing="7" cellpadding="0">
      <tr>
        <td>Hora</td>
        <td>Nota</td>
        <td>&nbsp;</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_Recordset1['horas']; ?></td>
          <td><?php echo $row_Recordset1['nota']; ?></td>
          <td>&nbsp;</td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
    -->
<br />
  </form>
  <form action="insertar_cursos.php" method="post" name="form3" id="form3">
    <table width="900" border="0" cellspacing="0" cellpadding="5">
      <tr> </tr>
    </table>
  </form>
  <br />
</div>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
