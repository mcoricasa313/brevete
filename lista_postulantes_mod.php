<?php require_once('Connections/brevete.php'); ?>
<?php $codigo_postulante = $_GET["cod_postulante"];?>
<?php 
session_start(); 
$tipo_user = $_SESSION['tipo_user'];
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE postulantes SET nom_postulante=%s, fecha_nac=%s, fecha_medico=%s, id_tramite=%s, num_licencia=%s, id_tipodoc=%s, num_documento=%s, ds_direccion=%s, email=%s WHERE cod_postulante=%s",
                       GetSQLValueString($_POST['nom_postulante'], "text"),
                       GetSQLValueString($_POST['fecha_nac'], "date"),
                       GetSQLValueString($_POST['fecha_medico'], "date"),
                       GetSQLValueString($_POST['id_tramite'], "text"),
                       GetSQLValueString($_POST['num_licencia'], "text"),
                       GetSQLValueString($_POST['id_tipodoc'], "text"),
                       GetSQLValueString($_POST['num_documento'], "text"),
                       GetSQLValueString($_POST['ds_direccion'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['cod_postulante'], "int"));

  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($updateSQL, $brevete) or die(mysql_error());

  $updateGoTo = "lista_postulantes.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_brevete, $brevete);
$query_postulantes = "SELECT * FROM postulantes WHERE cod_postulante = ".$codigo_postulante;
$postulantes = mysql_query($query_postulantes, $brevete) or die(mysql_error());
$row_postulantes = mysql_fetch_assoc($postulantes);
$totalRows_postulantes = mysql_num_rows($postulantes);

mysql_select_db($database_brevete, $brevete);
$query_tramites = "SELECT * FROM tramite  ORDER BY tramite.indice asc";
$tramites = mysql_query($query_tramites, $brevete) or die(mysql_error());
$row_tramites = mysql_fetch_assoc($tramites);
$totalRows_tramites = mysql_num_rows($tramites);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/BotonActionController.js"></script>

<title>Lista postulantes - Modificar</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th align="center" scope="col"><table width="900" border="0" cellspacing="0" cellpadding="0" frame="border">
        <tr>
          <th align="left" bgcolor="#999999" scope="col"> <span style="color: #999">X </span><span style="color: #FFF">Registro de Postulantes</span></th>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <th align="left" bgcolor="#999999" scope="col"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">
                <tr>
                  <td rowspan="2" valign="top" bgcolor="#999999"><img src="images/logo2.jpg" alt="" width="400" height="150" /></td>
                  <td height="80" bgcolor="#999999"><input name="button3" type="button" class="boton_1" id="button3" value="Inicio" onclick="location.href='menu_principal.php'"/></td>
                  <td bgcolor="#999999"><input name="button3" type="button" class="boton_1" id="button15" value="Registrar" onclick="btn_registrar()"  /></td>
                  <td align="center" bgcolor="#999999"><?php if($tipo_user=="a"){?>
                    <input name="button3" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()"/>
                    <?php }else{?>
                    <input name="button3" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()" disabled="disabled"/>
                    <?php }?></td>
                  <td width="29%" bgcolor="#999999"><input name="button3" type="button" class="boton_1" id="button17" value="Consulta" onclick="btn_consulta()" /></td>
                  <td width="7%" bgcolor="#999999"><input name="button3" type="button" class="boton_1" id="button18" value="Reporte" onclick="btn_reporte()" /></td>
                  <td width="7%" bgcolor="#999999"><input name="button3" type="button" class="boton_salida" id="button19" value="Cerrar" onclick="location.href='logout.php'"/></td>
                </tr>
                <tr>
                  <td height="120" bgcolor="#999999"></td>
                  <td align="center" valign="top" bgcolor="#999999" id="col_registrar"><table width="100%" border="0" cellpadding="0" cellspacing="5" id="tabla_registrar">
                    <tr>
                      <td bgcolor="#999999"><input name="registrar_capacitacion" type="button" class="boton_lista" id="registrar_capacitacion" value="Capacitacion" onclick="location.href='registro_capacitaciones.php'"  /></td>
                    </tr>
                    <tr>
                      <td bgcolor="#999999"><input name="btn_registrar_postulante" type="button" class="boton_lista" id="btn_registrar_postulante" value="Postulante" onclick="location.href='registro_postulantes.php'"/></td>
                    </tr>
                  </table></td>
                  <td valign="top" bgcolor="#999999" id="col_mantenimiento"><table width="100%" border="0" cellpadding="0" cellspacing="5" id="tabla_mantenimiento">
                    <tr>
                      <td valign="top"><input name="btn_mentenimiento_cursos" type="button" class="boton_lista" id="btn_mentenimiento_cursos" value="Cursos" onclick="location.href='mantenimiento_curso.php'"/></td>
                    </tr>
                    <tr>
                      <td><input name="btn_registrar_usuario" type="button" class="boton_lista" id="btn_registrar_usuario" value="Usuario" onclick="location.href='lista_usuarios.php'"/></td>
                    </tr>
                    <tr>
                      <td><input name="btn_registrar_usuario" type="button" class="boton_lista" id="btn_registrar_usuario" value="Postulantes" onclick="location.href='lista_postulantes.php'"/></td>
                    </tr>
                  </table></td>
                  <td valign="top" bgcolor="#999999" id="col_consulta"><table width="100%" border="0" cellpadding="0" cellspacing="5" id="tabla_consulta">
                    <tr>
                      <td valign="top"><input name="btn_mentenimiento_cursos2" type="button" class="boton_lista" id="btn_mentenimiento_cursos2" value="Capacitacion" onclick="location.href='busquedas.php'"/></td>
                    </tr>
                    <tr>
                      <td><input name="btn_registrar_usuario2" type="button" class="boton_lista" id="btn_registrar_usuario2" value="Certificado" onclick="location.href='generar_certificado.php'"/></td>
                    </tr>
                  </table></td>
                  <td valign="top" bgcolor="#999999" id="col_reporte"><table width="100%" border="0" cellpadding="0" cellspacing="5" id="tabla_reportes">
                    <tr>
                      <td valign="top"><input name="btn_mentenimiento_cursos3" type="button" class="boton_lista" id="btn_mentenimiento_cursos3" value="Logueo" onclick="location.href='reportes_logueo.php'"/></td>
                    </tr>
                    <tr>
                      <td><input name="btn_registrar_usuario3" type="button" class="boton_lista" id="btn_registrar_usuario3" value="Certificados" onclick="location.href='reportes_generales.php'"/></td>
                    </tr>
                  </table></td>
                  <td bgcolor="#999999">&nbsp;</td>
                </tr>
              </table></th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <th width="190" align="left" bgcolor="#E2E2E2" style="color: #000" scope="col">Codigo</th>
              <th width="179" align="left" bgcolor="#E2E2E2" scope="col"><label for="cod_postulante"></label>
                <input name="cod_postulante" type="text" id="cod_postulante" value="<?php echo $row_postulantes['cod_postulante']; ?>" size="10" /></th>
              <th width="123" align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>
              <th width="158" align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>
              <th width="100" align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>
            </tr>
            <tr>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">Nombres</td>
              <td colspan="4" align="left" bgcolor="#E2E2E2"><label for="nom_postulante"></label>
                <input name="nom_postulante" type="text" id="nom_postulante" value="<?php echo $row_postulantes['nom_postulante']; ?>" size="100" /></td>
            </tr>
            <tr>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">Tramite</td>
              <td align="left" bgcolor="#E2E2E2"><label for="id_tramite"></label>
                <select name="id_tramite" id="id_tramite" title="<?php echo $row_tramites['nombre']; ?>">
                  <option value="0" <?php if (!(strcmp(0, $row_postulantes['id_tramite']))) {echo "selected=\"selected\"";} ?>>Seleccionar</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_tramites['id_tramite']?>"<?php if (!(strcmp($row_tramites['id_tramite'], $row_postulantes['id_tramite']))) {echo "selected=\"selected\"";} ?>><?php echo $row_tramites['nombre']?></option>
                  <?php
} while ($row_tramites = mysql_fetch_assoc($tramites));
  $rows = mysql_num_rows($tramites);
  if($rows > 0) {
      mysql_data_seek($tramites, 0);
	  $row_tramites = mysql_fetch_assoc($tramites);
  }
?>
                </select></td>
              <td width="123" align="left" bgcolor="#E2E2E2" style="color: #000">N° Licencia</td>
              <td align="left" bgcolor="#E2E2E2"><label for="num_licencia"></label>
                <input name="num_licencia" type="text" id="num_licencia" value="<?php echo $row_postulantes['num_licencia']; ?>" /></td>
              <td align="left" bgcolor="#E2E2E2">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">Fecha Nacimiento</td>
              <td align="left" bgcolor="#E2E2E2"><label for="fecha_nac"></label>
                <input name="fecha_nac" type="date" id="fecha_nac" value="<?php echo $row_postulantes['fecha_nac']; ?>" />                
                <label for="fecha_nac"></label></td>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">E-Mail</td>
              <td align="left" bgcolor="#E2E2E2"><label for="ds_revalidacion"></label>
                <input name="ds_revalidacion" type="hidden" id="ds_revalidacion" value="<?php echo $row_postulantes['ds_revalidacion']; ?>" />
                <input name="email" type="text" id="email" value="<?php echo $row_postulantes['email']; ?>" /></td>
              <td align="left" bgcolor="#E2E2E2">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">Fecha Medico</td>
              <td align="left" bgcolor="#E2E2E2"><label for="fecha_medico"></label>
                <input name="fecha_medico" type="date" id="fecha_medico" value="<?php echo $row_postulantes['fecha_medico']; ?>" />                
                <label for="fecha_medico"></label></td>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">&nbsp;</td>
              <td align="left" bgcolor="#E2E2E2"><label for="email"></label></td>
              <td align="left" bgcolor="#E2E2E2">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">Tipo de Doc</td>
              <td align="left" bgcolor="#E2E2E2"><label for="id_tipodoc"></label>
                <select name="id_tipodoc" id="id_tipodoc">
                  <option value="1" selected="selected">DNI</option>
                  <option value="2">CARNE DE EXTRANJERIA</option>
                </select></td>
              <td colspan="2" rowspan="2" align="left" bgcolor="#E2E2E2"><table width="120" border="0" cellspacing="3" cellpadding="0">
                <tr>
                  <th scope="col"><input type="submit" name="button" id="button" value="Grabar" /></th>
                  <th scope="col"><input type="submit" name="button2" id="button2" value="Cancelar" /></th>
                </tr>
              </table></td>
              <td align="left" bgcolor="#E2E2E2">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" bgcolor="#E2E2E2" style="color: #000">N° de Documento</td>
              <td align="left" bgcolor="#E2E2E2"><label for="num_documento"></label>
                <input name="num_documento" type="text" id="num_documento" value="<?php echo $row_postulantes['num_documento']; ?>" /></td>
              <td align="left" bgcolor="#E2E2E2">&nbsp;</td>
            </tr>
            <tr>
              <td width="190" align="left" bgcolor="#E2E2E2" style="color: #000">Dirección</td>
              <td colspan="4" align="left" bgcolor="#E2E2E2"><label for="email"></label>
                <input name="ds_direccion" type="text" id="ds_direccion" value="<?php echo $row_postulantes['ds_direccion']; ?>" size="100" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#E2E2E2">&nbsp;</td>
        </tr>
      </table></th>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($postulantes);

mysql_free_result($tramites);
?>
