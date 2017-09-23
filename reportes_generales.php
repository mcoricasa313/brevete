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
$query_certificados = "SELECT * FROM certificados a, postulantes b, tramite c where a.postulante=b.num_documento and b.id_tramite=c.id_tramite; ";
$certificados = mysql_query($query_certificados, $brevete) or die(mysql_error());
$row_certificados = mysql_fetch_assoc($certificados);
$totalRows_certificados = mysql_num_rows($certificados);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Generar Certificado</title>
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
<form id="form1" name="form1" method="post" action="reporte3.pdf.php">
  <table width="800" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <th scope="col"><table width="800" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th bgcolor="#999999" scope="col">Reporte de Certificados</th>
        </tr>
        <tr>
          <th bgcolor="#999999" scope="col"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">
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
        <tr>
          <td bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="5" cellpadding="0">
            <tr>
              <td width="99%" height="200" colspan="5" align="left" bgcolor="#8F8F8F"><table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr>
                  <th scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow:scroll" height="100">
                    <tr>
                      <td align="left" valign="top"><input type="submit" name="button2" id="button2" value="Generar Reporte" />
                        <div style="overflow:scroll;height:300px;width:1400px">
                        <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CACACA" id="table1" class="mytable filterable">
                          <tr>
                            <th bgcolor="#DADADA" class="parrafo_negro_pequeno" scope="col">Num Certificado</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Prom. Teoria</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Horas Teoria</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Fecha Inicio</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Fecha Fin</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Prom. Practicas</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Horas Practica</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Estado</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Tramite </th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Postulante</th>
                            <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Imprimir</th>
                            </tr>
                                                        <?php do { ?>

                          <tr>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['codigo_certificado']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['prom_teoria']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['horas_teoria']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['fecha_inicio']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['fecha_fin']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['prom_practicas']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['horas_practica']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['estado']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['nombre']; ?></th>
                              <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_certificados['num_documento']; ?></th>
                     <?php if(($row_certificados['estado']=='P')||($row_certificados['estado']=='F')){?>
  <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><a href="reporte2.pdf.php?dato=<?php echo $row_certificados['codigo_certificado'];?>">Imprimir</a>
                              </th>
                              <?php }else{?>
                             <th bgcolor="#FFFFFF"></th>
                              <?php }?>
                              </tr>
                                                        <?php } while ($row_certificados = mysql_fetch_assoc($certificados)); ?>

                          </table>
                        </div></td>
                      </tr>
                    </table></th>
                  </tr>
                </table></td>
              <td width="1%" align="left">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      s</th>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($certificados);
?>
