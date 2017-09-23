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
$query_auditoria = "SELECT * FROM auditoria";
$auditoria = mysql_query($query_auditoria, $brevete) or die(mysql_error());
$row_auditoria = mysql_fetch_assoc($auditoria);
$totalRows_auditoria = mysql_num_rows($auditoria);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Reportes Logueo</title>
<script type="text/javascript" src="tablefilter/tablefilter.js"></script>

<script type="text/javascript">
var tf = setFilterGrid("table1");  
 var tf01 = new TF('table1');  
    tf01.AddGrid();  
	var tf02 = new TF("table2",2);  
tf02.AddGrid();
var agregar_local_teoria = new Spry.Data.HTMLDataSet("persistencia/locales.html", "tramite", {sortOnLoad: "Id", sortOrderOnLoad: "ascending"});
</script>
<script type="text/javascript" src="js/BotonActionController.js"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="reporte1.pdf.php">
  <table width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col"><table width="75%" border="0" cellspacing="0" cellpadding="0" frame="box">
        <tr>
          <th colspan="4" align="left" bgcolor="#999999" style="color: #FFF" scope="col"> <span style="color: #999">X </span>Menu Principal - [Reportes Logueo]</th>
          <th align="right" bgcolor="#999999" style="color: #FFF" scope="col"><input type="submit" name="button" id="button" value="X" style="color:#FFFFFF;background:#990000;font-weight:bold;border:0 px"/></th>
        </tr>
        <tr>
          <td colspan="5" align="left" bgcolor="#999999"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">
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
          <td height="100" colspan="5" align="left" valign="top" bgcolor="#999999"><span style="overflow:scroll;height:300px">
            <input type="submit" name="button3" id="button3" value="Imprimir Repote" />
            </span>
            <div style="overflow:scroll;height:300px">
              <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CACACA" id="table1" class="mytable filterable">
              <tr>
                <th width="8%" bgcolor="#DADADA" class="parrafo_negro_small" scope="col">ID</th>
                <th width="8%" bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Fecha ingreso</th>
                <th width="10%" bgcolor="#DADADA" class="parrafo_negro_small" scope="col">hora de ingreso</th>
                <th width="7%" bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Fecha de salida</th>
                <th width="9%" bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Hora de salida</th>
                <th width="58%" bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Usuario</th>
                </tr>
              <?php do { ?>
                
                <tr>
                  <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_auditoria['id_auditoria']; ?></th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_auditoria['fe_ingreso']; ?></th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_auditoria['mt_horaingreso']; ?></th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_auditoria['fe_salida']; ?></th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_auditoria['mt_horasalida']; ?></th>
                  <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_auditoria['st_ingreso']; ?></th>
                  </tr>
                <?php } while ($row_auditoria = mysql_fetch_assoc($auditoria)); ?>
              
            </table>
          </div></td>
        </tr>
      </table></th>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($auditoria);
?>
