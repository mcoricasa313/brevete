<?php require_once('Connections/brevete.php'); ?>

<?php

$dato = "";

if($_GET['dato']!=NULL){

	$dato = $_GET['dato'];

	}

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
  $updateSQL = sprintf("UPDATE usuarios SET ds_usuario=%s, ds_clave=%s, st_activo=%s, st_nivel=%s, ds_nombres=%s WHERE id_usuario=%s",
                       GetSQLValueString($_POST['ds_usuario'], "text"),
                       GetSQLValueString($_POST['ds_clave'], "text"),
                       GetSQLValueString(isset($_POST['st_activo']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['st_nivel'], "text"),
                       GetSQLValueString($_POST['ds_nombres'], "text"),
                       GetSQLValueString($dato, "int"));

  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($updateSQL, $brevete) or die(mysql_error());

  $updateGoTo = "lista_usuarios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
 

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



$maxRows_lista_usuarios = 15;

$pageNum_lista_usuarios = 0;

if (isset($_GET['pageNum_lista_usuarios'])) {

  $pageNum_lista_usuarios = $_GET['pageNum_lista_usuarios'];

}

$startRow_lista_usuarios = $pageNum_lista_usuarios * $maxRows_lista_usuarios;



mysql_select_db($database_brevete, $brevete);

$query_lista_usuarios = "SELECT * FROM usuarios";

$query_limit_lista_usuarios = sprintf("%s LIMIT %d, %d", $query_lista_usuarios, $startRow_lista_usuarios, $maxRows_lista_usuarios);

$lista_usuarios = mysql_query($query_limit_lista_usuarios, $brevete) or die(mysql_error());

$row_lista_usuarios = mysql_fetch_assoc($lista_usuarios);



if (isset($_GET['totalRows_lista_usuarios'])) {

  $totalRows_lista_usuarios = $_GET['totalRows_lista_usuarios'];

} else {

  $all_lista_usuarios = mysql_query($query_lista_usuarios);

  $totalRows_lista_usuarios = mysql_num_rows($all_lista_usuarios);

}

$totalPages_lista_usuarios = ceil($totalRows_lista_usuarios/$maxRows_lista_usuarios)-1;







mysql_select_db($database_brevete, $brevete);

$query_MaximoID = "SELECT MAX(id_usuario) FROM usuarios";

$MaximoID = mysql_query($query_MaximoID, $brevete) or die(mysql_error());

$row_MaximoID = mysql_fetch_assoc($MaximoID);

$totalRows_MaximoID = mysql_num_rows($MaximoID);



mysql_select_db($database_brevete, $brevete);

$query_usuario_actualizar = "SELECT * FROM usuarios  WHERE usuarios.id_usuario  = ".$dato;

$usuario_actualizar = mysql_query($query_usuario_actualizar, $brevete) or die(mysql_error());

$row_usuario_actualizar = mysql_fetch_assoc($usuario_actualizar);

$totalRows_usuario_actualizar = mysql_num_rows($usuario_actualizar);



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

<script type="text/javascript" src="js/BotonActionController.js"></script>



</head>



<body>

<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <th align="center" scope="col"><table width="800" border="0" cellspacing="0" cellpadding="0" frame="border">

        <tr>

          <th colspan="3" bgcolor="#999999" scope="col">Listado de Usuarios - Modificar</th>

        </tr>

        <tr>

          <th colspan="3" bgcolor="#999999" scope="col"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">

            <tr>

              <td rowspan="2" valign="top" bgcolor="#999999"><img src="images/logo2.jpg" alt="" width="400" height="150" /></td>

              <td height="80" bgcolor="#999999"><input name="button" type="button" class="boton_1" id="button" value="Inicio" onclick="location.href='menu_principal.php'"/></td>

              <td bgcolor="#999999"><input name="button" type="button" class="boton_1" id="button15" value="Registrar" onclick="btn_registrar()"  /></td>

              <td align="center" bgcolor="#999999"><?php if($tipo_user=="a"){?>

                <input name="button" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()"/>

                <?php }else{?>

                <input name="button" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()" disabled="disabled"/>

                <?php }?></td>

              <td width="29%" bgcolor="#999999"><input name="button" type="button" class="boton_1" id="button17" value="Consulta" onclick="btn_consulta()" /></td>

              <td width="7%" bgcolor="#999999"><input name="button" type="button" class="boton_1" id="button18" value="Reporte" onclick="btn_reporte()" /></td>

              <td width="7%" bgcolor="#999999"><input name="button" type="button" class="boton_salida" id="button19" value="Cerrar" onclick="location.href='logout.php'"/></td>

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

        <tr>

          <td width="373" align="left" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">

            <tr>

              <th align="left" scope="col"><fieldset class="parrafo_negro">

                <legend>Datos de usuario</legend>

                <table width="81%" border="0" cellspacing="5" cellpadding="0">

                  <tr>

                    <th width="29%" align="left" class="parrafo_negro" scope="col">Codigo</th>

                    <th width="43%" align="left" class="parrafo_negro" scope="col"><label for="textfield4"></label>

                      <input name="textfield4" type="text" id="textfield4" value="<?php echo $row_usuario_actualizar['id_usuario']; ?>" readonly="readonly" /></th>

                    <td align="left" class="parrafo_negro" scope="col">&nbsp;</td>

                  </tr>

                  <tr>

                    <td align="left" class="parrafo_negro">Usuario</td>

                    <td colspan="2" align="left"><label for="ds_usuario"></label>

                      <input name="ds_usuario" type="text" id="ds_usuario" value="<?php echo $row_usuario_actualizar['ds_usuario']; ?>" size="35" readonly="readonly" /></td>

                  </tr>

                  <tr>

                    <td align="left" class="parrafo_negro">Contraseña</td>

                    <td align="left"><label for="ds_clave"></label>

                      <input name="ds_clave" type="password" id="ds_clave" value="<?php echo $row_usuario_actualizar['ds_clave']; ?>" /></td>

                    <td align="left" class="parrafo_negro"><input <?php if (!(strcmp($row_usuario_actualizar['st_activo'],"s"))) {echo "checked=\"checked\"";} ?> name="st_activo" type="checkbox" id="st_activo" value="s"/>

                      Activo</td>

                  </tr>

                  <tr>

                    <td align="left" class="parrafo_negro">Nombre</td>

                    <td colspan="2" align="left"><label for="ds_nombres"></label>

                      <input name="ds_nombres" type="text" id="ds_nombres" value="<?php echo $row_usuario_actualizar['ds_nombres']; ?>" size="35" /></td>

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

                    <td class="parrafo_negro"><input <?php if (!(strcmp($row_usuario_actualizar['st_nivel'],"a"))) {echo "checked=\"checked\"";} ?> type="radio" name="st_nivel" id="radio" value="a" />

                      <label for="st_nivel">Administrador</label></td>

                  </tr>

                  <tr>

                    <td class="parrafo_negro"><input <?php if (!(strcmp($row_usuario_actualizar['st_nivel'],"p"))) {echo "checked=\"checked\"";} ?> type="radio" name="st_nivel" id="radio2" value="p" />

                      <label for="st_nivel">Personal</label></td>

                  </tr>

                </table>

              </fieldset></th>

            </tr>

          </table></td>

          <td width="109" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">

            <tr>

              <th scope="col"><table width="100%" border="0" cellspacing="5" cellpadding="0">

                <tr>

                  <th scope="col"><input name="button3" type="submit" class="btn_numeros" id="button3" value="Grabar" style="background:#C00;color:#FFFFFF"/></th>

                </tr>

                <tr>

                  <td><input name="button4" type="submit" class="btn_numeros" id="button4" value="Cancelar" /></td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

                </tr>

                <tr>

                  <td>&nbsp;</td>

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

                  <th bgcolor="#999999" class="parrafo_blanco" scope="col">Codigo</th>

                  <th bgcolor="#999999" class="parrafo_blanco" scope="col">Usuario</th>

                  <th bgcolor="#999999" class="parrafo_blanco" scope="col">Nombres</th>

                  <th bgcolor="#999999" class="parrafo_blanco" scope="col">Nivel</th>

                  <th bgcolor="#999999" class="parrafo_blanco" scope="col">Estado</th>

                  <th bgcolor="#999999" class="parrafo_blanco" scope="col">Editar</th>

                  <th bgcolor="#999999" class="parrafo_blanco" scope="col">Eliminar</th>

                </tr>

                 <?php do { ?>

                <tr class="parrafo_negro">

                 

                    <td bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_lista_usuarios['id_usuario']; ?></td>

                    <td bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_lista_usuarios['ds_usuario']; ?></td>

                    <td bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_lista_usuarios['ds_nombres']; ?></td>                   

       				<?php 

					$nivel = "";

					if($row_lista_usuarios['st_nivel']=="a"){

					$nivel = "Administrador";

					}else{

					$nivel = "Personal";

					}

					

					?>

 

                    <td bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $nivel; ?></td>

 					<?php 

					$estado = "";

					if($row_lista_usuarios['st_activo']=="s"){

						$estado = "Activo";

					}else{

						$estado = "Deshabilitado";

					}

						?>

 

                   <td bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $estado;//$row_lista_usuarios['st_activo']; ?></td>

                   <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><a href="lista_usuarios_modificar.php?dato=<?php echo $row_lista_usuarios['id_usuario']; ?>"><img src="images/draw21.png" alt="" width="20" height="20" /></a></td>

                   <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><img src="images/cancel.png" width="20" height="20" /></td>

                </tr>

            <?php } while ($row_lista_usuarios = mysql_fetch_assoc($lista_usuarios)); ?>



                <tr>

                  <td height="60" colspan="7" bgcolor="#999999">&nbsp;</td>

                </tr>

              </table></th>

            </tr>

          </table></td>

        </tr>

      </table></th>

    </tr>

  </table>

  <input type="hidden" name="MM_insert" value="form1" />
  <input type="hidden" name="MM_update" value="form1" />
</form>

</body>

</html>

<?php

mysql_free_result($lista_usuarios);



mysql_free_result($MaximoID);



mysql_free_result($usuario_actualizar);

?>

