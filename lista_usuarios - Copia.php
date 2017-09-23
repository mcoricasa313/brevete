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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuarios (ds_usuario, ds_clave, st_activo, st_nivel, ds_nombres) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ds_usuario'], "text"),
                       GetSQLValueString($_POST['ds_clave'], "text"),
                       GetSQLValueString($_POST['st_activo'], "text"),
                       GetSQLValueString($_POST['st_nivel'], "text"),
                       GetSQLValueString($_POST['ds_nombres'], "text"));

  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($insertSQL, $brevete) or die("Error al ingresar datos ".mysql_error());

  $insertGoTo = "lista_usuarios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Lista de Usuarios</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th align="center" scope="col"><table width="800" border="0" cellspacing="0" cellpadding="0" frame="border">
        <tr>
          <th colspan="3" bgcolor="#999999" scope="col">Listado de Usuarios</th>
        </tr>
        <tr>
          <td width="373" align="left" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th align="left" scope="col"><fieldset class="parrafo_negro">
                <legend>Datos de usuario</legend>
                <table width="81%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <th width="29%" align="left" class="parrafo_negro" scope="col">Codigo</th>
                    <th width="43%" align="left" class="parrafo_negro" scope="col"><label for="textfield4"></label>
                      <input type="text" name="textfield4" id="textfield4" /></th>
                    <td align="left" class="parrafo_negro" scope="col">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" class="parrafo_negro">Usuario</td>
                    <td colspan="2" align="left"><label for="ds_usuario"></label>
                      <input name="ds_usuario" type="text" id="ds_usuario" size="35" /></td>
                  </tr>
                  <tr>
                    <td align="left" class="parrafo_negro">Contraseña</td>
                    <td align="left"><label for="ds_clave"></label>
                      <input type="text" name="ds_clave" id="ds_clave" /></td>
                    <td align="left" class="parrafo_negro"><input name="st_activo" type="checkbox" id="st_activo" value="s"/>
                      Activo</td>
                  </tr>
                  <tr>
                    <td align="left" class="parrafo_negro">Nombre</td>
                    <td colspan="2" align="left"><label for="ds_nombres"></label>
                      <input name="ds_nombres" type="text" id="ds_nombres" size="35" /></td>
                  </tr>
                </table>
                <br />
              </fieldset></th>
            </tr>
          </table></td>
          <td width="268" align="left" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th align="left" scope="col"><fieldset>
                <legend class="parrafo_negro">Nivel</legend>
                <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <th align="left" class="parrafo_negro" scope="col">
                    <input type="checkbox" name="st_nivel" id="st_nivel" value="a"/>
                    <label for="checkbox2">Administrador General</label>
                      </th>
                  </tr>
                  <tr>
                    <td class="parrafo_negro"><input type="checkbox" name="st_nivel" id="st_nivel" value="p"/>
                      <label for="checkbox3">Personal Administrativo</label></td>
                  </tr>
                </table>
              </fieldset></th>
            </tr>
          </table></td>
          <td width="109" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th scope="col"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <th scope="col"><input name="button" type="submit" class="btn_numeros" id="button" value="Nuevo" /></th>
                </tr>
                <tr>
                  <td><input name="button2" type="submit" class="btn_numeros" id="button2" value="Modificar" /></td>
                </tr>
                <tr>
                  <td><input name="button3" type="submit" class="btn_numeros" id="button3" value="Grabar" /></td>
                </tr>
                <tr>
                  <td><input name="button4" type="submit" class="btn_numeros" id="button4" value="Cancelar" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#E2E2E2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th scope="col"><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#DFDFDF">
                <tr>
                  <th bgcolor="#FFFFFF" scope="col">&nbsp;</th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro" scope="col">Codigo</th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro" scope="col">Usuario</th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro" scope="col">Nombres</th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro" scope="col">Nivel</th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro" scope="col">Estado</th>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td height="60" colspan="6" bgcolor="#999999">&nbsp;</td>
                  </tr>
              </table></th>
            </tr>
          </table></td>
        </tr>
      </table></th>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>
