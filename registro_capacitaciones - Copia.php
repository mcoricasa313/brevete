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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO curso (id_local, nom_curso, hora_inicio, hora_fin, profesor) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['local2'], "int"),
                       GetSQLValueString($_POST['nombre_curso_add'], "text"),
                       GetSQLValueString($_POST['hora_inicio'], "date"),
                       GetSQLValueString($_POST['hora_fin'], "date"),
                       GetSQLValueString($_POST['profesor'], "text"));

  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($insertSQL, $brevete) or die(mysql_error());

  $insertGoTo = "registro_capacitaciones.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}






if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

$nota[1] = $_POST['nota'];
$nota[2] = $_POST['nota2'];
$nota[3] = $_POST['nota3'];
$nota[4] = $_POST['nota4'];
$nota[5] = $_POST['nota5'];
$nota[6] = $_POST['nota6'];
$nota[7] = $_POST['nota7'];
$nota[8] = $_POST['nota8'];
$nota[9] = $_POST['nota9'];
$nota[10] = $_POST['nota10'];
$nota[11] = $_POST['nota11'];
$nota[12] = $_POST['nota12'];
$nota[13] = $_POST['nota13'];
	
$curso_inicio[1] = $_POST['curso_inicio'];
$curso_inicio[2] = $_POST['curso_inicio2'];
$curso_inicio[3] = $_POST['curso_inicio3'];
$curso_inicio[4] = $_POST['curso_inicio4'];
$curso_inicio[5] = $_POST['curso_inicio5'];
$curso_inicio[6] = $_POST['curso_inicio6'];
$curso_inicio[7] = $_POST['curso_inicio7'];
$curso_inicio[8] = $_POST['curso_inicio8'];
$curso_inicio[9] = $_POST['curso_inicio9'];
$curso_inicio[10] = $_POST['curso_inicio10'];
$curso_inicio[11] = $_POST['curso_inicio11'];
$curso_inicio[12] = $_POST['curso_inicio12'];
$curso_inicio[13] = $_POST['curso_inicio13'];

$curso_fin[1] = $_POST['curso_fin'];
$curso_fin[2] = $_POST['curso_fin2'];
$curso_fin[3] = $_POST['curso_fin3'];
$curso_fin[4] = $_POST['curso_fin4'];
$curso_fin[5] = $_POST['curso_fin5'];
$curso_fin[6] = $_POST['curso_fin6'];
$curso_fin[7] = $_POST['curso_fin7'];
$curso_fin[8] = $_POST['curso_fin8'];
$curso_fin[9] = $_POST['curso_fin9'];
$curso_fin[10] = $_POST['curso_fin10'];
$curso_fin[11] = $_POST['curso_fin11'];
$curso_fin[12] = $_POST['curso_fin12'];
$curso_fin[13] = $_POST['curso_fin13'];

$id_curso[1]= $_POST['id_curso'];
$id_curso[2]= $_POST['id_curso2'];
$id_curso[3]= $_POST['id_curso3'];
$id_curso[4]= $_POST['id_curso4'];
$id_curso[5]= $_POST['id_curso5'];
$id_curso[6]= $_POST['id_curso6'];
$id_curso[7]= $_POST['id_curso7'];
$id_curso[8]= $_POST['id_curso8'];
$id_curso[9]= $_POST['id_curso9'];
$id_curso[10]= $_POST['id_curso10'];
$id_curso[11]= $_POST['id_curso11'];
$id_curso[12]= $_POST['id_curso12'];
$id_curso[13]= $_POST['id_curso13'];



for($i=1;$i<14;$i++){



  $insertSQL = sprintf("INSERT INTO registro_capacitacion (doc_identidad, id_curso, nota, curso_inicio, curso_fin, local, horas_practica, nota_practica, fecha_practica) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       //GetSQLValueString($_POST['id_capacitacion'], "int"),
                       GetSQLValueString($_POST['documento_postulante'], "int"),
                       GetSQLValueString($id_curso[$i], "int"),
//                       GetSQLValueString($_POST['nota'], "int"),
                       GetSQLValueString($nota[$i], "int"),
                       GetSQLValueString($curso_inicio[$i], "date"),
                       GetSQLValueString($curso_fin[$i], "date"),
                       GetSQLValueString($_POST['local'], "text"),
                       GetSQLValueString($_POST['horas_practica'], "text"),
                       GetSQLValueString($_POST['nota_practica'], "text"),
                       GetSQLValueString($_POST['fecha_practica'], "date"));

  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($insertSQL, $brevete) or die(mysql_error());
//aqui termina el for
}

  $insertGoTo = "registro_capacitaciones.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_Recordset_capacitacion = 10;
$pageNum_Recordset_capacitacion = 0;
if (isset($_GET['pageNum_Recordset_capacitacion'])) {
  $pageNum_Recordset_capacitacion = $_GET['pageNum_Recordset_capacitacion'];
}
$startRow_Recordset_capacitacion = $pageNum_Recordset_capacitacion * $maxRows_Recordset_capacitacion;

mysql_select_db($database_brevete, $brevete);
$query_Recordset_capacitacion = "SELECT MAX( registro_capacitacion.id_capacitacion) FROM registro_capacitacion";
$query_limit_Recordset_capacitacion = sprintf("%s LIMIT %d, %d", $query_Recordset_capacitacion, $startRow_Recordset_capacitacion, $maxRows_Recordset_capacitacion);
$Recordset_capacitacion = mysql_query($query_limit_Recordset_capacitacion, $brevete) or die(mysql_error());
$row_Recordset_capacitacion = mysql_fetch_assoc($Recordset_capacitacion);

if (isset($_GET['totalRows_Recordset_capacitacion'])) {
  $totalRows_Recordset_capacitacion = $_GET['totalRows_Recordset_capacitacion'];
} else {
  $all_Recordset_capacitacion = mysql_query($query_Recordset_capacitacion);
  $totalRows_Recordset_capacitacion = mysql_num_rows($all_Recordset_capacitacion);
}
$totalPages_Recordset_capacitacion = ceil($totalRows_Recordset_capacitacion/$maxRows_Recordset_capacitacion)-1;

mysql_select_db($database_brevete, $brevete);
$query_persistencia_tramite = "SELECT * FROM tramite";
$persistencia_tramite = mysql_query($query_persistencia_tramite, $brevete) or die(mysql_error());
$row_persistencia_tramite = mysql_fetch_assoc($persistencia_tramite);
$totalRows_persistencia_tramite = mysql_num_rows($persistencia_tramite);

mysql_select_db($database_brevete, $brevete);
$query_Recordset1 = "SELECT * FROM curso";
$Recordset1 = mysql_query($query_Recordset1, $brevete) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_brevete, $brevete);
$query_cursos = "SELECT * FROM curso";
$cursos = mysql_query($query_cursos, $brevete) or die(mysql_error());
$row_cursos = mysql_fetch_assoc($cursos);
$totalRows_cursos = mysql_num_rows($cursos);

mysql_select_db($database_brevete, $brevete);

?>
<?php 
date_default_timezone_set("America/Lima");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:spry="http://ns.adobe.com/spry">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Registro de capacitaciones</title>
<style type="text/css"></style>
<script src="SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
var ds1 = new Spry.Data.HTMLDataSet("persistencia/locales.html", "tramite", {sortOnLoad: "Id", sortOrderOnLoad: "ascending"});
var persistencia_curso = new Spry.Data.HTMLDataSet("persistencia/cursos.html", "tramite", {sortOnLoad: "Id", sortOrderOnLoad: "ascending"});
</script>
<script type="text/javascript" src="js/comparar_fechas.js"></script>
<script type="text/javascript">
document.getElementById("fila10").style.display ="none";
document.getElementById("fila11").style.display = "none";
document.getElementById("fila12").style.display = "none";
document.getElementById("fila13").style.display = "none";
document.getElementById("fila14").style.display = "none";
document.getElementById("fila15").style.display = "none";




</script>


<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="60%" border="0" cellspacing="0" cellpadding="0" frame="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <th bgcolor="#999999" scope="col">Registro de Capacitaciones</th>
      </tr>
      <tr>
        <td bgcolor="#E2E2E2"><img src="img/logo.jpg" alt="" width="220" height="58" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form id="form2" name="form2" method="post" action="">
      <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td bgcolor="#E2E2E2"><fieldset>
            <legend style="color: #000">Datos del conductor</legend>
            <table width="100%" border="0" cellspacing="0" cellpadding="3" frame="">
              <tr>
                <th width="18%" align="left" bgcolor="#E2E2E2" style="color: #000" scope="col">DNI / Carn&eacute; de Extranjeria</th>
                <th width="29%" align="left" bgcolor="#E2E2E2" scope="col"> <?php 
					
					$prueba = "";
					if(isset($_REQUEST['buscarxdni'])){
						$capturado = $_POST['tipodoc'];
						$prueba = $capturado;	
					}else{
						$prueba = "0";
					}
					
					
					?>
                  <?php 
$query_Recordset1 = "SELECT * FROM postulantes WHERE postulantes.num_documento = ".$prueba;
//$query_Recordset1 = "SELECT * FROM postulantes WHERE postulantes.num_documento = ";
$Recordset1 = mysql_query($query_Recordset1, $brevete) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
				?>
                  <label for="curso_inicio6"></label>
                  <span id="sprytextfield2"><span class="textfieldRequiredMsg">Se necesita el documento de identidad.</span><span class="textfieldInvalidFormatMsg">Debe ingresar un numero.</span></span><span id="sprytextfield3">
                  <label for="text1"></label>
                  <input type="text" name="tipodoc" id="tipodoc" maxlength="8" <?php echo "value='".$row_Recordset1['num_documento']."'"?> />
                  <br />
                  <span class="textfieldRequiredMsg">Se necesita el documento de identidad.</span><span class="textfieldInvalidFormatMsg">Formato no valido.</span></span></th>
                <?php 
		  $documento = "";
		  $documento = $row_Recordset1['num_documento'];
			  ?>
                <th width="53%" align="left" bgcolor="#E2E2E2" scope="col"> <input type="submit" name="buscarxdni" id="buscarxdni" value="Buscar" onclick="capturar_dni();" />
                </th>
              </tr>
              <tr>
                <td align="left" bgcolor="#E2E2E2" style="color: #000">Nombres</td>
                <td colspan="2" bgcolor="#E2E2E2"><label for="nombres_postulante6"></label>
                  <input name="nombres_postulante" type="text" id="nombres_postulante6" size="100" readonly="readonly" <?php echo "value='".$row_Recordset1['nom_postulante']."'"?> /></td>
              </tr>
              <tr>
                <td align="left" bgcolor="#E2E2E2" style="color: #000">Tramite</td>
                <td colspan="2" bgcolor="#E2E2E2"><label for="tramite_postulante6"></label>
                  <?php do { ?>
                  <?php if($row_Recordset1['id_tramite'] ==  $row_persistencia_tramite['id_tramite']){ ?>
                  <input name="tramite_postulante" type="text" id="tramite_postulante6" size="100" readonly="readonly" <?php echo "value='".$row_persistencia_tramite['nombre']."'";?>  />
                  <?php }?>
                  <?php } while ($row_persistencia_tramite = mysql_fetch_assoc($persistencia_tramite)); ?></td>
              </tr>
            </table>
            <br />
          </fieldset></td>
        </tr>
        <tr>
          <td bgcolor="#E2E2E2">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="<?php echo $editFormAction; ?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" frame="">
        <tr>
          <td bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td width="64%" align="left"><fieldset>
                    <legend style="color: #000">Cursos <br />
                      </legend>
                    <table width="99%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <th align="left" style="color: #000" scope="col"><input name="activator" type="button" class="activator" id="activator" value="AgregarCurso" /></th>
                        <th colspan="2" style="color: #000" scope="col">&nbsp;</th>
                        <th colspan="3" style="color: #000" scope="col">&nbsp;</th>
                        <th style="color: #000" scope="col">&nbsp;</th>
                        <th style="color: #000" scope="col">&nbsp;</th>
                      </tr>
                      <tr>
                        <th width="13%" style="color: #000" scope="col">Cursos</th>
                        <th colspan="2" style="color: #000" scope="col">Nota</th>
                        <th colspan="3" style="color: #000" scope="col">Fecha</th>
                        <th width="12%" style="color: #000" scope="col">Locales</th>
                        <th width="4%" style="color: #000" scope="col">&nbsp;</th>
                      </tr>
                      <tr>
                        <td><label for="id_curso2"></label>
                          <select name="id_curso" id="select3">
                            <option value="0">Seleccionar</option>
                            <?php
do {  
?>
                            <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                            <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                          </select></td>
                        <td width="3%"><label for="nota2"></label>
                          <input name="nota" type="number" id="nota2" size="3"  max="20"/></td>
                        <td width="8%"><input name="textfield5" type="text" disabled="disabled" id="textfield5" size="3" /></td>
                        <td width="22%"><label for="textfield5"></label>
                          <input type="date" name="curso_inicio" id="curso_inicio"/></td>
                        <td colspan="2"><input type="date" name="curso_fin" id="curso_fin" /></td>
                        <td><div spry:region="ds1">
                          <select name="local" id="local" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><select name="id_curso2" id="select2">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td><input name="nota2" type="number" id="nota2" size="3"  max="20"/></td>
                        <td><input name="textfield7" type="text" disabled="disabled" id="textfield7" size="3" /></td>
                        <td><input type="date" name="curso_inicio2" id="curso_inicio2" /></td>
                        <td colspan="2"><input type="date" name="curso_fin2" id="curso_fin2" /></td>
                        <td><div spry:region="ds1">
                          <select name="select7" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><select name="id_curso3" id="id_curso3">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td><input name="nota3" type="number" id="nota3" size="3"  max="20"/></td>
                        <td><input name="textfield9" type="text" disabled="disabled" id="textfield9" size="3" /></td>
                        <td><input type="date" name="curso_inicio3" id="curso_inicio3" /></td>
                        <td colspan="2"><input type="date" name="curso_fin3" id="curso_fin3" /></td>
                        <td><div spry:region="ds1">
                          <select name="select8" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><select name="id_curso4" id="select14">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td><input name="nota4" type="number" id="nota4" size="3"  max="20"/></td>
                        <td><input name="textfield11" type="text" disabled="disabled" id="textfield11" size="3" /></td>
                        <td><input type="date" name="curso_inicio4" id="curso_inicio4" /></td>
                        <td colspan="2"><input type="date" name="curso_fin4" id="curso_fin4" /></td>
                        <td><div spry:region="ds1">
                          <select name="select9" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><select name="id_curso5" id="id_curso5">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td><input name="nota5" type="number" id="nota5" size="3"  max="20"/></td>
                        <td><input name="textfield13" type="text" disabled="disabled" id="textfield13" size="3" /></td>
                        <td><input type="date" name="curso_inicio5" id="curso_inicio5" /></td>
                        <td colspan="2"><input type="date" name="curso_fin5" id="curso_fin5" /></td>
                        <td><div spry:region="ds1">
                          <select name="select10" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr id="fila08">
                        <td><select name="id_curso6" id="id_curso6">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td><input name="nota6" type="number" id="nota6" size="3"  max="20"/></td>
                        <td><input name="textfield15" type="text" disabled="disabled" id="textfield15" size="3" /></td>
                        <td><input type="date" name="curso_inicio6" id="curso_inicio6"/></td>
                        <td colspan="2"><input type="date" name="curso_fin6" id="curso_fin6" /></td>
                        <td><div spry:region="ds1">
                          <select name="select11" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr id="fila09">
                        <td align="center"><select name="id_curso7" id="select7">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td align="center"><input name="nota7" type="number" id="nota7" size="3"  max="20"/></td>
                        <td align="left"><input name="textfield" type="text" disabled="disabled" id="textfield" size="3" /></td>
                        <td><input type="date" name="curso_inicio7" id="curso_inicio7"/></td>
                        <td colspan="2"><input type="date" name="curso_fin7" id="curso_fin7" /></td>
                        <td><div spry:region="ds1">
                          <select name="select13" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="borrar_fila09()"/></td>
                      </tr>
                      <tr id="fila10">
                        <td align="center"><select name="id_curso8" id="select8">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td align="center"><input name="nota8" type="number" id="nota8" size="3"  max="20"/></td>
                        <td align="left"><input name="textfield2" type="text" disabled="disabled" id="textfield2" size="3" /></td>
                        <td><input type="date" name="curso_inicio8" id="curso_inicio8"/></td>
                        <td colspan="2"><input type="date" name="curso_fin8" id="curso_fin8" /></td>
                        <td><div spry:region="ds1">
                          <select name="select14" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="borrar_fila10()"/></td>
                      </tr>
                      <tr id="fila11">
                        <td align="center"><select name="id_curso9" id="select9">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td align="center"><input name="nota9" type="number" id="nota9" size="3"  max="20"/></td>
                        <td align="left"><input name="textfield3" type="text" disabled="disabled" id="textfield3" size="3" /></td>
                        <td><input type="date" name="curso_inicio9" id="curso_inicio9"/></td>
                        <td colspan="2"><input type="date" name="curso_fin9" id="curso_fin9" /></td>
                        <td><div spry:region="ds1">
                          <select name="select15" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="borrar_fila11()"/></td>
                      </tr>
                      <tr id="fila12">
                        <td align="center"><select name="id_curso10" id="select10">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td align="center"><input name="nota10" type="number" id="nota10" size="3"  max="20"/></td>
                        <td align="left"><input name="textfield4" type="text" disabled="disabled" id="textfield4" size="3" /></td>
                        <td><input type="date" name="curso_inicio10" id="curso_inicio10"/></td>
                        <td colspan="2"><input type="date" name="curso_fin10" id="curso_fin10" /></td>
                        <td><div spry:region="ds1">
                          <select name="select16" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="borrar_fila12()"/></td>
                      </tr>
                      <tr id="fila13">
                        <td align="center"><select name="id_curso11" id="select11">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td align="center"><input name="nota11" type="number" id="nota11" size="3"  max="20"/></td>
                        <td align="left"><input name="textfield6" type="text" disabled="disabled" id="textfield6" size="3" /></td>
                        <td><input type="date" name="curso_inicio11" id="curso_inicio11"/></td>
                        <td colspan="2"><input type="date" name="curso_fin11" id="curso_fin11" /></td>
                        <td><div spry:region="ds1">
                          <select name="select17" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="borrar_fila13()"/></td>
                      </tr>
                      <tr id="fila14">
                        <td align="center"><select name="id_curso12" id="select12">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td align="center"><input name="nota12" type="number" id="nota12" size="3"  max="20"/></td>
                        <td align="left"><input name="textfield8" type="text" disabled="disabled" id="textfield8" size="3" /></td>
                        <td><input type="date" name="curso_inicio12" id="curso_inicio12"/></td>
                        <td colspan="2"><input type="date" name="curso_fin12" id="curso_fin12" /></td>
                        <td><div spry:region="ds1">
                          <select name="select18" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="borrar_fila14()"/></td>
                      </tr>
                      <tr id="fila15">
                        <td align="center"><select name="id_curso13" id="select13">
                          <option value="0">Seleccionar</option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_cursos['id_curso']?>"><?php echo $row_cursos['nom_curso']?></option>
                          <?php
} while ($row_cursos = mysql_fetch_assoc($cursos));
  $rows = mysql_num_rows($cursos);
  if($rows > 0) {
      mysql_data_seek($cursos, 0);
	  $row_cursos = mysql_fetch_assoc($cursos);
  }
?>
                        </select></td>
                        <td align="center"><input name="nota13" type="number" id="nota13" size="3"  max="20"/></td>
                        <td align="left"><input name="textfield10" type="text" disabled="disabled" id="textfield10" size="3" /></td>
                        <td><input type="date" name="curso_inicio13" id="curso_inicio13"/></td>
                        <td colspan="2"><input type="date" name="curso_fin13" id="curso_fin13" /></td>
                        <td><div spry:region="ds1">
                          <select name="select" spry:repeatchildren="ds1">
                            <option value="{Local}" selected="selected">{Local}</option>
                          </select>
                        </div></td>
                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="borrar_fila15()"/></td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center"><span style="color: #000">Numero de certificado</span></td>
                        <td><input name="id_capacitacion" type="text" id="id_capacitacion" value="<?php				$relleno = $row_Recordset_capacitacion['MAX( registro_capacitacion.id_capacitacion)']+1;
					  echo str_pad($relleno,6,"0",STR_PAD_LEFT); ?>" size="15" /></td>
                        <td width="2%">&nbsp;</td>
                        <td align="right"><input type="button" name="button7" id="button7" value="Agregar" onclick="agregar_fila();"/>
                          <input type="button" name="button8" id="button8" value="Agregar" onclick="agregar_fila2();"/>
                          <input type="button" name="button9" id="button9" value="Agregar" onclick="agregar_fila3();"/>
                          <input type="button" name="button10" id="button10" value="Agregar" onclick="agregar_fila4();"/>
                          <input type="button" name="button11" id="button11" value="Agregar" onclick="agregar_fila5();"/>
                          <input type="button" name="button12" id="button12" value="Agregar" onclick="agregar_fila6();"/>
                          <input type="button" name="button13" id="button13" value="Agregar" onclick="agregar_fila7();"/>
                          <input type="button" name="button14" id="button14" value="Agregar" onclick="agregar_fila8();"/></td>
                        <td><input type="button" name="button2" id="button2" value="Calcular" onclick="datos_impresion();"/></td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </fieldset></td>
                  <td width="36%" align="left" valign="top"><fieldset>
                    <legend style="color: #000">Resultados</legend>
                    <br />
                    <table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <th colspan="4" scope="col"><span style="color: #000">Practicas de manejo</span></th>
                      </tr>
                      <tr>
                        <td width="22%" style="color: #000">Horas </td>
                        <td width="23%"><span style="color: #000">Nota</span></td>
                        <td width="24%"><span style="color: #000">Fecha</span></td>
                        <td width="31%"><span style="color: #000">Locales</span></td>
                      </tr>
                      <tr>
                        <td><input name="horas_practica" type="text" id="horas_practica" size="2" /></td>
                        <td><input name="nota_practica" type="text" id="nota_practica" size="2" /></td>
                        <td><input type="date" name="fecha_practica" id="fecha_practica" /></td>
                        <td><div spry:region="ds1">
                          <select name="select27" spry:repeatchildren="ds1">
                            <option value="{Local}">{Local}</option>
                          </select>
                        </div></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </fieldset></td>
                </tr>
                <tr>
                  <td colspan="2" align="left"><fieldset style="color: #000">
                    <legend>Datos de impresion</legend>
                    <br />
                    <table width="100%" border="0" cellspacing="3" cellpadding="0">
                      <tr>
                        <th width="15%" height="38" align="left" style="color: #000" scope="col">N&ordm; Cerificado</th>
                        <th width="21%" align="left" scope="col"><label for="certificado_impresion2"></label>
                          <input type="text" name="certificado_impresion" id="certificado_impresion2" /></th>
                        <th width="14%" align="left" scope="col">&nbsp;</th>
                        <th width="7%" align="left" scope="col">&nbsp;</th>
                        <th width="10%" align="left" scope="col">&nbsp;</th>
                        <th width="10%" scope="col">&nbsp;</th>
                        <th width="10%" scope="col">&nbsp;</th>
                        <th width="13%" scope="col">&nbsp;</th>
                      </tr>
                      <tr>
                        <td align="left" style="color: #000">Fecha inicio</td>
                        <td align="left"><label for="id_curso11"></label>
                          <input type="date" name="fecha_inicio_impresion" id="fecha_inicio_impresion" /></td>
                        <td align="left" style="color: #000">Fecha Fin</td>
                        <td align="left"><input type="date" name="fecha_final_impresion" id="fecha_final_impresion" /></td>
                        <td align="left">&nbsp;</td>
                        <td><input name="button3" type="reset" class="btn_numeros" id="button3" value="Nuevo" /></td>
                        <td><input name="button4" type="submit" class="btn_numeros" id="button4" value="Grabar" /></td>
                        <td><input name="button5" type="reset" class="btn_numeros" id="button5" value="Cancelar" /></td>
                      </tr>
                      <tr>
                        <td align="left" style="color: #000">Promedio</td>
                        <td align="left"><label for="promedio2"></label>
                          <input name="promedio" type="text" id="promedio2" size="5" maxlength="3" /></td>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </fieldset></td>
                </tr>
              </table></th>
            </tr>
          </table></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert2" value="form1" />
      <input type="hidden" name="documento_postulante" id="documento_postulante" value="<?php echo $documento;?>"  />
    </form></td>
  </tr>
</table>
<div class="overlay" id="overlay" style="display:none;"></div>

<div class="box" id="box">
 <a class="boxclose" id="boxclose"></a>
 <h1>Agregar Curso</h1>
 <form id="form3" name="form3" method="POST" action="<?php echo $editFormAction; ?>">
   <br />
   <table width="900" border="0" cellspacing="0" cellpadding="5">
     <tr>
       <td width="135" class="parrafo_negro">Nombre</td>
       <td width="346"><label for="nombre_curso_add"></label>
         <span id="sprytextfield1">
         <input type="text" name="nombre_curso_add" id="nombre_curso_add" />
        <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
       <td width="67" class="parrafo_negro">Local</td>
       <td width="228"><div spry:region="ds1">
         <select name="local2" id="local2" spry:repeatchildren="ds1">
           <option value="{Local}" selected="selected">{Local}</option>
         </select>
       </div></td>
       <td width="74">&nbsp;</td>
     </tr>
     <tr>
       <td class="parrafo_negro">Hora de inicio</td>
       <td><label for="hora_inicio"></label>
        <input type="time" name="hora_inicio" id="hora_inicio" /></td>
       <td class="parrafo_negro">Profesor</td>
       <td><label for="select"></label>
         <select name="profesor" id="select">
           <option value="0" selected="selected">Seleccionar</option>
           <option value="1">Luis Falcon Garcia</option>
           <option value="2">Renzo Garibaldi Robles</option>
        </select></td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td class="parrafo_negro">Hora de fin</td>
       <td><label for="hora_fin"></label>
        <input type="time" name="hora_fin" id="hora_fin" /></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td class="parrafo_negro"><input type="submit" name="button" id="button" value="Grabar" />
        <input type="reset" name="button6" id="button6" value="Limpiar" /></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
    </table>
   <input type="hidden" name="MM_insert" value="form3" />
 </form>
</div>


<div class="content">
            <!-- The activator -->
</div>


<script type="text/javascript" src="jquery/jquery-1.3.2.js"></script>
<script type="text/javascript">
$(function() {
    $('#activator').click(function(){
        $('#overlay').fadeIn('fast',function(){
            $('#box').animate({'top':'160px'},500);
        });
    });
    $('#boxclose').click(function(){
        $('#box').animate({'top':'-500px'},500,function(){
            $('#overlay').fadeOut('fast');
        });
    });

});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer");
</script>


</body>
</html>
<?php
mysql_free_result($Recordset_capacitacion);

mysql_free_result($persistencia_tramite);

mysql_free_result($Recordset1);

mysql_free_result($cursos);
?>
