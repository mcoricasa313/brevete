<?php 
require_once('Connections/brevete.php');
?>
<?php 
session_start(); 
$tipo_user = $_SESSION['tipo_user'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Menu Principal</title>
<script type="text/javascript" src="js/BotonActionController.js"></script>
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th align="center" scope="col"><form id="form1" name="form1" method="post" action="">
      <table width="800" border="0" cellspacing="0" cellpadding="0" frame="box">
        <tr>
          <th width="423" align="left" bgcolor="#999999" style="color: #FFF" scope="col"> <span style="color: #999">X </span>Menu Principal</th>
          <th width="137" align="right" bgcolor="#999999" style="color: #FFF" scope="col"><a href="logout.php">Cerrar</a></th>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#999999"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">
            <tr>
              <td rowspan="2" valign="top" bgcolor="#999999"><img src="images/logo2.jpg" alt="" width="400" height="150" /></td>
              <td height="80" bgcolor="#999999"><input name="button2" type="button" class="boton_1" id="button2" value="Inicio" onclick="location.href='menu_principal.php'"/></td>
              <td bgcolor="#999999"><input name="button2" type="button" class="boton_1" id="button15" value="Registrar" onclick="btn_registrar()"  /></td>
              <td align="center" bgcolor="#999999">
              <?php if($tipo_user=="a"){?>
              <input name="button2" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()"/>
              <?php }else{?>
              <input name="button2" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()" disabled="disabled"/>
              <?php }?>
              </td>
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
          <td height="650" colspan="2" align="center" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="7" cellpadding="0">
            <tr>
              <td height="650"><img src="images/13g.png" alt="" width="100%" height="100%" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></th>
  </tr>
</table>
</body>
</html>
