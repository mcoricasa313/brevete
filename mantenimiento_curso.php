<?php require_once('Connections/brevete.php'); ?>
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

mysql_select_db($database_brevete, $brevete);
$query_cursos = "SELECT * FROM curso";
$cursos = mysql_query($query_cursos, $brevete) or die(mysql_error());
$row_cursos = mysql_fetch_assoc($cursos);
$totalRows_cursos = mysql_num_rows($cursos);

mysql_select_db($database_brevete, $brevete);
$query_MAX_ID_CURSO = "SELECT MAX(id_curso) FROM curso";
$MAX_ID_CURSO = mysql_query($query_MAX_ID_CURSO, $brevete) or die(mysql_error());
$row_MAX_ID_CURSO = mysql_fetch_assoc($MAX_ID_CURSO);
$totalRows_MAX_ID_CURSO = mysql_num_rows($MAX_ID_CURSO);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/BotonActionController.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<script type="text/javascript">
function obtener_id(){
	
	
}

</script>

<?php 
if(isset($_POST['id_curso'])){
	$id_curso1 = $_POST['id_curso'];
}else{
	$id_curso1 = "";	
}
?>

<title>Reportes Generales</title>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="mantenimiento_curso.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col"><table width="800" border="0" cellspacing="0" cellpadding="0" frame="box">
        <tr>
          <th width="130" align="left" bgcolor="#999999" style="color: #FFF" scope="col"> <span style="color: #999">X </span>Menu Principal - [Reportes Generales]</th>
          <th width="143" align="right" bgcolor="#999999" style="color: #FFF" scope="col"><input type="submit" name="button" id="button" value="X" style="color:#FFFFFF;background:#990000;font-weight:bold;border:0 px"/></th>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#999999"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">
            <tr>
              <td rowspan="2" valign="top" bgcolor="#999999"><img src="images/logo2.jpg" alt="" width="400" height="150" /></td>
              <td height="80" bgcolor="#999999"><input name="button2" type="button" class="boton_1" id="button2" value="Inicio" onclick="location.href='menu_principal.php'"/></td>
              <td bgcolor="#999999"><input name="button2" type="button" class="boton_1" id="button15" value="Registrar" onclick="btn_registrar()"  /></td>
              <td align="center" bgcolor="#999999"><?php if($tipo_user=="a"){?>
                <input name="button2" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()"/>
                <?php }else{?>
                <input name="button2" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()" disabled="disabled"/>
                <?php }?></td>
              <td width="29%" bgcolor="#999999"><input name="button2" type="button" class="boton_1" id="button17" value="Consulta" onclick="btn_consulta()" /></td>
              <td width="7%" bgcolor="#999999"><input name="button2" type="button" class="boton_1" id="button18" value="Reporte" onclick="btn_reporte()" /></td>
              <td width="7%" bgcolor="#999999"><input name="button2" type="button" class="boton_salida" id="button19" value="Cerrar" onclick="location.href='logout.php'"/></td>
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
          </table></td>
          </tr>
        <tr>
          <td colspan="2" align="left" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="7">
            <tr>
              <td><input type="button" name="activator" id="activator" value="Agregar Nuevo" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="200" colspan="2" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th height="250" align="left" valign="top" bgcolor="#999999" scope="col"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" bgcolor="#000000">ID_CURSO</td>
                      <td align="center" bgcolor="#000000">NOMBRE</td>
                      <td align="center" bgcolor="#000000">LOCAL</td>
                      <td align="center" bgcolor="#000000">PROFESOR</td>
                      <td align="center" bgcolor="#000000">HORA INICIO</td>
                      <td align="center" bgcolor="#000000">HORA FIN</td>
                      <td align="center" bgcolor="#000000">ELIMINAR</td>
                      </tr>
                    <?php do { ?>
                      <tr class="parrafo_negro_pequeno">
                        <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_cursos['id_curso']; ?></td>
                        <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_cursos['nom_curso']; ?></td>
                        <td align="center" bgcolor="#FFFFFF" class="parrafo_negro">Los Olivos</td>
                        <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_cursos['profesor']; ?></td>
                        <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_cursos['hora_inicio']; ?></td>
                        <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_cursos['hora_fin']; ?></td>
                        <td align="center" bgcolor="#FFFFFF"><a href="eliminar_curso.php?id_curso=<?php echo $row_cursos['id_curso']; ?>"><img src="images/cancel.png" width="20" height="20" /></a></td>
                        </tr>
                      <?php } while ($row_cursos = mysql_fetch_assoc($cursos)); ?>
                    
                    </table>
                    </th>
                  </tr>
                  <tr><td align="left" bgcolor="#990000"> <?php if(isset($_GET['mensaje'])){echo $_GET['mensaje'];}?></td></tr>
                </table></th>
              </tr>
            </table></td>
        </tr>
      </table></th>
    </tr>
  </table>
</form>

<div class="overlay" id="overlay" style="display:none;"></div>

<div class="box" id="box"> <a class="boxclose" id="boxclose"></a>
  <h1>Agregar Curso</h1>
  <form id="form3" name="form3" method="post" action="insertar_cursos2.php">
    <br />
    <table width="900" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td class="parrafo_negro">ID</td>
        <td><label for="textfield"></label>
        <input name="id_curso" type="text" id="id_curso" value="<?php echo $row_MAX_ID_CURSO['MAX(id_curso)']+1; ?>" readonly="readonly"/></td>
        <td class="parrafo_negro">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="135" class="parrafo_negro">Nombre</td>
        <td width="346"><label for="nombre_curso_add"></label>
          <span id="sprytextfield1">
            <input type="text" name="nombre_curso_add" id="nombre_curso_add" />
            <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
        <td width="67" class="parrafo_negro">Local</td>
        <td width="228"><div spry:region="ds1">
          <select name="local2" id="local2" spry:repeatchildren="ds1">
            <option value="Los Olivos">Los Olivos</option>
            <option value="0" selected="selected">Seleccionar</option>
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
            <option value="Luis Falcon Garcia">Luis Falcon Garcia</option>
            <option value="Renzo Garibaldi Robles">Renzo Garibaldi Robles</option>
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
        <td class="parrafo_negro"><input type="submit" name="button4" id="button4" value="Grabar" />
          <input type="reset" name="button6" id="button6" value="Limpiar" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
</form>
  <form name="form4" method="post" action="insertar_cursos.php">
    <table width="900" border="0" cellspacing="0" cellpadding="5">
      <tr> </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>

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

</script>


</body>
</html>
<?php
mysql_free_result($cursos);

mysql_free_result($MAX_ID_CURSO);
?>
