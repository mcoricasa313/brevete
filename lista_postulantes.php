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

$maxRows_lista_postulantes = 20;
$pageNum_lista_postulantes = 0;
if (isset($_GET['pageNum_lista_postulantes'])) {
  $pageNum_lista_postulantes = $_GET['pageNum_lista_postulantes'];
}
$startRow_lista_postulantes = $pageNum_lista_postulantes * $maxRows_lista_postulantes;

mysql_select_db($database_brevete, $brevete);
$query_lista_postulantes = "SELECT * FROM postulantes";
$query_limit_lista_postulantes = sprintf("%s LIMIT %d, %d", $query_lista_postulantes, $startRow_lista_postulantes, $maxRows_lista_postulantes);
$lista_postulantes = mysql_query($query_limit_lista_postulantes, $brevete) or die(mysql_error());
$row_lista_postulantes = mysql_fetch_assoc($lista_postulantes);

if (isset($_GET['totalRows_lista_postulantes'])) {
  $totalRows_lista_postulantes = $_GET['totalRows_lista_postulantes'];
} else {
  $all_lista_postulantes = mysql_query($query_lista_postulantes);
  $totalRows_lista_postulantes = mysql_num_rows($all_lista_postulantes);
}
$totalPages_lista_postulantes = ceil($totalRows_lista_postulantes/$maxRows_lista_postulantes)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/BotonActionController.js"></script>

<script type="text/javascript" src="tablefilter/tablefilter.js"></script>
<script type="text/javascript"> 
    var tf = setFilterGrid("table1");  
 var tf01 = new TF('table1');  
    tf01.AddGrid();  
	var tf02 = new TF("table2",2);  
tf02.AddGrid();  
</script>
<title>Lista de postulantes</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th align="center" scope="col"><table width="600" border="0" cellspacing="0" cellpadding="0" frame="border">
        <tr>
          <th bgcolor="#999999" scope="col">Listado de Postulantes</th>
        </tr>
        <tr>
          <td bgcolor="#E2E2E2" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th align="left" bgcolor="#999999" scope="col"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">
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
              </table></th>
            </tr>
            <tr>
              <th align="left" bgcolor="#999999" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr>
                  <th bgcolor="#999999" scope="col"><table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#DFDFDF" id="table1" class="mytable filterable">
                    <tr bgcolor="#CCCCCC">
                      <th class="parrafo_negro" scope="col">Codigo</th>
                      <th class="parrafo_negro" scope="col">Conductor</th>
                      <th class="parrafo_negro" scope="col">Tramite</th>
                      <th class="parrafo_negro" scope="col">N° Licencias</th>
                      <th class="parrafo_negro" scope="col">Tipo Doc </th>
                      <th class="parrafo_negro" scope="col">N° Documento</th>
                      <th class="parrafo_negro" scope="col">Modificar</th>
                      <th class="parrafo_negro" scope="col">Eliminar</th>
                    </tr>
                    <?php do { ?>
                    <tr>
                      <td bgcolor="#FFFFFF"><span class="parrafo_negro"><?php echo $row_lista_postulantes['cod_postulante']; ?></span></td>
                      <td bgcolor="#FFFFFF"><span class="parrafo_negro"><?php echo $row_lista_postulantes['nom_postulante']; ?></span></td>
                      <td bgcolor="#FFFFFF"><span class="parrafo_negro"><?php echo $row_lista_postulantes['id_tramite']; ?></span></td>
                      <td bgcolor="#FFFFFF"><span class="parrafo_negro"><?php echo $row_lista_postulantes['num_licencia']; ?></span></td>
                      <td bgcolor="#FFFFFF"><span class="parrafo_negro"><?php echo $row_lista_postulantes['id_tipodoc']; ?></span></td>
                      <td bgcolor="#FFFFFF" class="parrafo_negro"><?php echo $row_lista_postulantes['num_documento']; ?></td>
                      <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><a href="lista_postulantes_mod.php?cod_postulante=<?php echo $row_lista_postulantes['cod_postulante'];?>"><img src="images/draw21.png" alt="" width="20" height="20" /></a></td>
                      <td align="center" bgcolor="#FFFFFF" class="parrafo_negro"><a href="eliminar_postulante.php?cod_postulante=<?php echo $row_lista_postulantes['cod_postulante'];?>"><img src="images/cancel.png" alt="" width="20" height="20" /></a></td>
                    </tr>
                    <?php } while ($row_lista_postulantes = mysql_fetch_assoc($lista_postulantes)); ?>
                    <tr>
                      <td bgcolor="#FFFFFF">&nbsp;</td>
                      <td bgcolor="#FFFFFF">&nbsp;</td>
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
                      <td bgcolor="#FFFFFF">&nbsp;</td>
                      <td bgcolor="#FFFFFF">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="60" colspan="8" bgcolor="#999999">&nbsp;</td>
                    </tr>
                  </table></th>
                  </tr>
                </table></th>
            </tr>
          </table></td>
        </tr>
      </table></th>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($lista_postulantes);
?>
