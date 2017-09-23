<?php require_once('Connections/brevete.php'); ?>
<?php require_once('Connections/brevete.php'); ?>
<?php require_once('Connections/brevete.php'); ?>
<?php require_once('Connections/brevete.php'); ?>
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
$incompleto=0;
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE certificados SET fecha_inicio=%s, fecha_fin=%s, prom_teoria=%s, prom_practicas=%s, horas_teoria=%s, horas_practica=%s, estado=%s WHERE codigo_certificado=%s",
                       GetSQLValueString($_POST['c_fechainicio'], "date"),
                       GetSQLValueString($_POST['c_fechafinal'], "date"),
                       GetSQLValueString($_POST['c_promteoria'], "int"),
                       GetSQLValueString($_POST['c_prompracticas'], "int"),
                       GetSQLValueString($_POST['c_horasteoria'], "int"),
                       GetSQLValueString($_POST['c_horaspractica'], "int"),
                       GetSQLValueString($_POST['c_estado'], "text"),
                       GetSQLValueString($_POST['certificado_num'], "int"));

  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($updateSQL, $brevete) or die(mysql_error());

  $updateGoTo = "busquedas.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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

$maxRows_todo_tramites = 1;
$pageNum_todo_tramites = 0;
if (isset($_GET['pageNum_todo_tramites'])) {
  $pageNum_todo_tramites = $_GET['pageNum_todo_tramites'];
}
$startRow_todo_tramites = $pageNum_todo_tramites * $maxRows_todo_tramites;

mysql_select_db($database_brevete, $brevete);
$query_todo_tramites = "SELECT * FROM tramite";
$query_limit_todo_tramites = sprintf("%s LIMIT %d, %d", $query_todo_tramites, $startRow_todo_tramites, $maxRows_todo_tramites);
$todo_tramites = mysql_query($query_limit_todo_tramites, $brevete) or die(mysql_error());
$row_todo_tramites = mysql_fetch_assoc($todo_tramites);

if (isset($_GET['totalRows_todo_tramites'])) {
  $totalRows_todo_tramites = $_GET['totalRows_todo_tramites'];
} else {
  $all_todo_tramites = mysql_query($query_todo_tramites);
  $totalRows_todo_tramites = mysql_num_rows($all_todo_tramites);
}
$totalPages_todo_tramites = ceil($totalRows_todo_tramites/$maxRows_todo_tramites)-1;

mysql_select_db($database_brevete, $brevete);
$query_todos_cursos = "SELECT * FROM curso";
$todos_cursos = mysql_query($query_todos_cursos, $brevete) or die(mysql_error());
$row_todos_cursos = mysql_fetch_assoc($todos_cursos);
$totalRows_todos_cursos = mysql_num_rows($todos_cursos);

mysql_select_db($database_brevete, $brevete);
$query_agregar_curso_teoria = "SELECT * FROM curso";
$agregar_curso_teoria = mysql_query($query_agregar_curso_teoria, $brevete) or die(mysql_error());
$row_agregar_curso_teoria = mysql_fetch_assoc($agregar_curso_teoria);
$totalRows_agregar_curso_teoria = mysql_num_rows($agregar_curso_teoria);

mysql_select_db($database_brevete, $brevete);
$query_maxid_practica_manejo = "SELECT MAX(registro_practicas.id) FROM registro_practicas";
$maxid_practica_manejo = mysql_query($query_maxid_practica_manejo, $brevete) or die(mysql_error());
$row_maxid_practica_manejo = mysql_fetch_assoc($maxid_practica_manejo);
$totalRows_maxid_practica_manejo = mysql_num_rows($maxid_practica_manejo);

mysql_select_db($database_brevete, $brevete);


//aqui capturamos el dato
$dato = "0";
if(isset($_GET["dato"])){
	$dato = $_GET["dato"];
}else{
	$dato = -1;
}

/*
if(isset($_POST["dato"])){
	$dato = $_POST["dato"];
}else{
	$dato = "0";
}
*/
$query_todo_capacitacion = "SELECT * FROM registro_capacitacion  WHERE registro_capacitacion.codigo_certificado = ".$dato;
$todo_capacitacion = mysql_query($query_todo_capacitacion, $brevete) or die(mysql_error());
$row_todo_capacitacion = mysql_fetch_assoc($todo_capacitacion);
$totalRows_todo_capacitacion = mysql_num_rows($todo_capacitacion);

mysql_select_db($database_brevete, $brevete);



$query_todo_certificados = "SELECT * FROM certificados  WHERE certificados.codigo_certificado = ".$dato.";";

$todo_certificados = mysql_query($query_todo_certificados, $brevete) or die(mysql_error());
$row_todo_certificados = mysql_fetch_assoc($todo_certificados);
$totalRows_todo_certificados = mysql_num_rows($todo_certificados);


mysql_select_db($database_brevete, $brevete);
$query_postulantes = "select * from (certificados left join postulantes on certificados.postulante = postulantes.num_documento) left join tramite on postulantes.id_tramite=tramite.id_tramite;";

$postulantes = mysql_query($query_postulantes, $brevete) or die(mysql_error());
$row_postulantes = mysql_fetch_assoc($postulantes);
$totalRows_postulantes = mysql_num_rows($postulantes);

mysql_select_db($database_brevete, $brevete);


$query_practicas_manejo = "SELECT * FROM registro_practicas  WHERE registro_practicas.codigo_certificado = ".$dato.";";

$practicas_manejo = mysql_query($query_practicas_manejo, $brevete) or die(mysql_error());
$row_practicas_manejo = mysql_fetch_assoc($practicas_manejo);
$totalRows_practicas_manejo = mysql_num_rows($practicas_manejo);


$query_certificados = "SELECT * FROM postulantes, certificados  WHERE certificados.postulante = postulantes.num_documento";
$certificados = mysql_query($query_certificados, $brevete) or die(mysql_error());
$row_certificados = mysql_fetch_assoc($certificados);
$totalRows_certificados = mysql_num_rows($certificados);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:spry="http://ns.adobe.com/spry">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>
<link href="lib/sweetalert.css" type="text/css" rel="stylesheet"/>


<script type="text/javascript" src="tablefilter/tablefilter.js"></script><script src="SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
var tf = setFilterGrid("table1");  
 var tf01 = new TF('table1');  
    tf01.AddGrid();  
	var tf02 = new TF("table2",2);  
tf02.AddGrid();
var agregar_local_teoria = new Spry.Data.HTMLDataSet("persistencia/locales.html", "tramite", {sortOnLoad: "Id", sortOrderOnLoad: "ascending"});
</script>

<script type="text/javascript" src="lib/sweetalert.min.js"></script>
<script type="text/javascript" src="lib/sweetalert-dev.js"></script>


<script type="text/javascript">
function validar_requisitos (){
	try{
	if(document.getElementById("obligatorio2").value==1){
			//alert("TIENE REQUISITOS PENDIENTES");
sweetAlert({title: "Error!",text: "El Postulante tiene Cursos Pendientes!",   type: "error",confirmButtonText: "OK"});
			
	}
		}catch(e){
			sweetAlert({title: "Generado!",text: "Se ha Generado el Certificado del postulante con las nuevas modificaciones",   type: "success",confirmButtonText: "OK"},function (){document.form1.submit();});
		
		//alert("CERTIFICADO GENERADO");
		}

	}

</script>
<script type="text/javascript" src="js/BotonActionController.js"></script>

<title>Busquedas</title>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>

<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>" s>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col"><table width="1000" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th bgcolor="#999999" scope="col">Modificar Capacitacion</th>
        </tr>
        <tr>
          <td bgcolor="#999999"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">
            <tr>
              <td rowspan="2" valign="top" bgcolor="#999999"><img src="images/logo2.jpg" alt="" width="400" height="150" /></td>
              <td height="80" bgcolor="#999999"><input name="button5" type="button" class="boton_1" id="button2" value="Inicio" onclick="location.href='menu_principal.php'"/></td>
              <td bgcolor="#999999"><input name="button5" type="button" class="boton_1" id="button15" value="Registrar" onclick="btn_registrar()"  /></td>
              <td align="center" bgcolor="#999999"><?php if($tipo_user=="a"){?>
                <input name="button5" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()"/>
                <?php }else{?>
                <input name="button5" type="button" class="boton_1" id="button16" value="Mantenimiento"  onclick="btn_mantenimiento()" disabled="disabled"/>
                <?php }?></td>
              <td width="29%" bgcolor="#999999"><input name="button5" type="button" class="boton_1" id="button17" value="Consulta" onclick="btn_consulta()" /></td>
              <td width="7%" bgcolor="#999999"><input name="button5" type="button" class="boton_1" id="button18" value="Reporte" onclick="btn_reporte()" /></td>
              <td width="7%" bgcolor="#999999"><input name="button5" type="button" class="boton_salida" id="button19" value="Cerrar" onclick="location.href='logout.php'"/></td>
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
          <td bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th scope="col">
              
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow:scroll" height="100">
                <tr>
                  <td valign="top">
                  
                  <div style="overflow:scroll;height:300px">
                  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CACACA" id="table1" class="mytable filterable">
                    <tr>
                      <th bgcolor="#DADADA" class="parrafo_negro_pequeno" scope="col">Certificado</th>
                      <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Conductor</th>
                      <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Tramite</th>
                      <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Documento</th>
                      <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Numero de Licencia</th>
                      <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Modificar</th>
                      <th bgcolor="#DADADA" class="parrafo_negro_small" scope="col">Detalle</th>
                    </tr>
                   <?php do { ?>
                    <tr>
                      <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col">
                          <span class="parrafo_negro_pequeno"><?php echo $row_postulantes['codigo_certificado']; ?>                          </span></th>
                      <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_postulantes['nom_postulante']; ?></th>
                      <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col">
					    <span class="parrafo_negro_pequeno">
					    <?php 
 						  echo $row_postulantes['nombre'];
					    ?>					    
					    </span></th>
                      <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_postulantes['num_documento']; ?></th>
                      <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><?php echo $row_postulantes['num_licencia']; ?></th>
                      <th bgcolor="#FFFFFF" scope="col"><img src="images/draw21.png" width="18" height="18" /></th>
                      <th bgcolor="#FFFFFF" scope="col"><a href="busquedas.php?dato=<?php echo $row_postulantes['codigo_certificado']; ?>"><img src="images/lupa.png" alt="" width="18" height="18" onclick=""/></a></th>
                    </tr>
                     <?php } while ($row_postulantes = mysql_fetch_assoc($postulantes)); ?>
                  </table>
                  </div>
                  
                  </td>
                </tr>
              </table></th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th width="48%" rowspan="2" align="left" scope="col"><fieldset>
                <legend class="parrafo_negro">Datos Capacitacion</legend>
                <table width="700" border="1" cellspacing="0" cellpadding="0" bordercolor="#C6ECFF">
                  <tr>
                    <td width="17%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_small">Num Certificado</td>
                    <td width="12%" align="center" bgcolor="#C6ECFF"><label for="c_horasteoria"><span class="parrafo_negro_small">Prom Teoria</span></label></td>
                    <td width="13%" align="center" bgcolor="#C6ECFF"><span class="parrafo_negro_pequeno">Horas Teoria</span></td>
                    <th width="16%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_small" scope="col">Fecha inicio</th>
                    <th width="13%" align="center" bgcolor="#C6ECFF" scope="col"><span class="parrafo_negro_small">Fecha Fin</span></th>
                    <th width="15%" align="center" bgcolor="#C6ECFF" scope="col"><label for="textfield2"><span class="parrafo_negro_pequeno">Prom. Practicas</span></label></th>
                    <th width="14%" align="center" bgcolor="#C6ECFF" scope="col"><span class="parrafo_negro_pequeno">Horas Practica</span></th>
                    </tr>
                  <tr align="center">
                    
                    <td bgcolor="#FFFFFF" class="parrafo_negro_small">
                    <input name="certificado_num" type="text" id="certificado_num" value="<?php echo $row_todo_certificados['codigo_certificado']; ?>" size="6" readonly="readonly" />
                    
                    </td>
                    <td bgcolor="#FFFFFF"><input name="c_promteoria" type="text" id="c_promteoria" value="<?php echo $row_todo_certificados['prom_teoria']; ?>" size="4" /></td>
                    <td bgcolor="#FFFFFF"><input name="c_horasteoria" type="text" id="c_horasteoria" value="<?php echo $row_todo_certificados['horas_teoria']; ?>" size="4" /></td>
                    <td bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><input name="c_fechainicio" type="text" id="c_fechainicio" value="<?php echo $row_todo_certificados['fecha_inicio']; ?>" size="10" /></td>
                    <td bgcolor="#FFFFFF"><input name="c_fechafinal" type="text" id="c_fechafinal" value="<?php echo $row_todo_certificados['fecha_fin']; ?>" size="10" /></td>
                    <td bgcolor="#FFFFFF"><input name="c_prompracticas" type="text" id="c_prompracticas" value="<?php echo $row_todo_certificados['prom_practicas']; ?>" size="4" /></td>
                    <td bgcolor="#FFFFFF"><input name="c_horaspractica" type="text" id="c_horaspractica" value="<?php echo $row_todo_certificados['horas_practica']; ?>" size="4" /></td>
                    </tr>
                </table>
                <input name="c_estado" type="hidden" id="c_estado" value="P" />
                <input type="button" name="button2" id="button" value="Generar Certificado" onclick="validar_requisitos();" />
</fieldset></th>
              <th width="46%" align="left" valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr>
                  <th align="left" scope="col"><fieldset>
                    <legend class="parrafo_negro">Practica de Manejo</legend>
                    <input name="activator" type="button" class="activator" id="activator" value="Modificar" />
                    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#C6ECFF">
                      <tr>
                        <th align="center" bgcolor="#C6ECFF" class="parrafo_negro_small" scope="col">Codigo</th>
                        <th width="15%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_small" scope="col">Horas</th>
                        <th width="25%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Nota</th>
                        <th width="25%" align="center" bgcolor="#C6ECFF" scope="col"><span class="parrafo_negro_small">Fecha</span></th>
                        </tr>
                      <?php do { ?>
                        <tr>
                          <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_small"><?php echo $row_practicas_manejo['id']; ?></td>
                          <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_small"><?php echo $row_practicas_manejo['horas']; ?></td>
                          <td align="center" bgcolor="#FFFFFF"><label for="c_horaspractica" class="parrafo_negro_pequeno"><?php echo $row_practicas_manejo['nota']; ?></label></td>
                          <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_practicas_manejo['fecha']; ?></td>
                        </tr>
                        <?php } while ($row_practicas_manejo = mysql_fetch_assoc($practicas_manejo)); ?>
                </table>
                  </fieldset></th>
                </tr>
              </table></th>
              <th width="6%" rowspan="2" align="center" scope="col">&nbsp;</th>
            </tr>
            <tr>
              <th align="left" valign="top" scope="col">&nbsp;</th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th align="left" scope="col"><fieldset>
                <legend class="parrafo_negro">Resultados Cursos</legend>
                <input name="activator2" type="button" class="activator2" id="activator2" value="Modificar" />
                <br />
                <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#C6ECFF">
                  <tr>
                    <th width="15%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Curso</th>
                    <th width="5%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Nota</th>
                    <th width="14%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Fecha Inicio</th>
                    <th width="13%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Fecha Fin</th>
                    <th width="15%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Horas</th>
                    <th width="11%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Local</th>
                    <th width="27%" bgcolor="#C6ECFF" scope="col">&nbsp;</th>
                  </tr>
                  <?php do { ?>
                  <?php if($row_todo_capacitacion['id_curso']!="0"){?>
                               
                       
                    <tr>
                      <th align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">
                        
                        <?php 
					  $obtener_nombre_curso = "";
						if(isset($row_todo_capacitacion['id_curso'])){
$obtener_nombre_curso = "SELECT * FROM curso WHERE  id_curso=".$row_todo_capacitacion['id_curso'];
						}else{
$obtener_nombre_curso = "SELECT * FROM curso WHERE id_curso=-1;";

						}

$resultset_temp =  mysql_query($obtener_nombre_curso,$brevete) or die(mysql_error());;

			 $row =  mysql_fetch_assoc($resultset_temp);
			  echo $row['nom_curso'];
					  ?>
                        
                      </th>
                       
                      <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php 
					  if($row_todo_capacitacion['nota']<11){
						  echo "<a style='color:red'>".$row_todo_capacitacion['nota']."</a>";
					  }else{
  						  echo "<a style='color:blue'>".$row_todo_capacitacion['nota']."</a>";

					  }
					  					  
					  ?></td>
                      <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_todo_capacitacion['curso_inicio'];?></td>
                      <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_todo_capacitacion['curso_fin'];?></td>
                      <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_todo_capacitacion['horas_teoria'];?></td>
                      <td align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_todo_capacitacion['local'];?></td>
                      <th width="27%" bgcolor="#C6ECFF" scope="col">&nbsp;</th>
                     </tr>
                     
                     
   
                    <?php }?>
                  <?php } while ($row_todo_capacitacion = mysql_fetch_assoc($todo_capacitacion)); ?>
                  
              </table>
                <table width="50%" border="0" cellspacing="0" cellpadding="0">
                </table>
                <br />
              </fieldset></th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <td align="left" valign="top"><fieldset class="parrafo_negro">
                <legend>Generar Certificado</legend>
                <br />
                <?php 
				if(isset($dato)){
				$query_tramite = "SELECT * FROM postulantes, certificados  WHERE certificados.postulante = postulantes.num_documento and certificados.codigo_certificado=".$dato;
				}else{
				$query_tramite = "SELECT * FROM postulantes, certificados  WHERE certificados.postulante = postulantes.num_documento and certificados.codigo_certificado=-1";
				
				}
				
$obtener_tramite = mysql_query($query_tramite, $brevete);
$row_obtener_tramite = mysql_fetch_assoc($obtener_tramite);
$totalRows_obtener_tramite = mysql_num_rows($obtener_tramite);
				?>
                
                <?php 
				if(isset($row_obtener_tramite['id_tramite'])){
				$query_tramitexcurso = "select a.id_curso,a.nom_curso,c.nombre,b.horasxcurso,b.horasxmanejo from curso a, cursosxtramite b,tramite c where a.id_curso=b.id_curso and c.id_tramite=b.id_tramite and c.id_tramite=".$row_obtener_tramite['id_tramite'];
				}else{
				$query_tramitexcurso = "select a.id_curso,a.nom_curso,c.nombre,b.horasxcurso,b.horasxmanejo from curso a, cursosxtramite b,tramite c where a.id_curso=b.id_curso and c.id_tramite=b.id_tramite and c.id_tramite=1";
				}
				$tramitexcurso = mysql_query($query_tramitexcurso, $brevete);
				$row_tramitexcurso = mysql_fetch_assoc($tramitexcurso);
				
				?>
                
                <table width="586" border="1" cellspacing="0" cellpadding="3" bordercolor="#C6ECFF">
                  <tr>
                    <td bgcolor="#C6ECFF" class="parrafo_negro_pequeno">Tramite</td>
                    <td width="176" bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_tramitexcurso['nombre']?></td>
                    <td width="184" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">&nbsp;</td>
                    <td width="72" bgcolor="#FFFFFF" class="parrafo_negro_pequeno">&nbsp;</td>
                    </tr>
                  <?php do { ?>
                    <tr>
                      <td width="104" bgcolor="#C6ECFF" class="parrafo_negro_pequeno">Curso</td>
                      <td bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_tramitexcurso['nom_curso'];?></td>
                      <td bgcolor="#FFFFFF" class="parrafo_negro_pequeno"><?php echo $row_tramitexcurso['horasxcurso'];?> horas</td>
                      <td bgcolor="#FFFFFF" class="parrafo_negro_pequeno">
					  <?php 
					//aqui capturamos los cursos necesitados
					 // echo $row_tramitexcurso['id_curso'];
					$temp = $row_tramitexcurso['id_curso'];
					$temp_horas = $row_tramitexcurso['horasxcurso'];
					 $query_aux_validar_nota = "SELECT * FROM registro_capacitacion where codigo_certificado = ".$dato." and id_curso!=0 and nota>10 and id_curso=".$temp." and horas_teoria>=".$temp_horas;
					 $Resultset_validar_nota = mysql_query($query_aux_validar_nota) or die("");
					 $row_validar_nota = mysql_fetch_assoc($Resultset_validar_nota);
					 $total_rows_validar_nota = mysql_num_rows($Resultset_validar_nota);

					
						 
	 						 
						 if($total_rows_validar_nota>0){
	 						 	echo "<a style='color:blue'>Cumple</a>";
							echo "<input id='obligatorio' type='hidden' value='0'></input>";
							//echo "<input id='obligatorio2' type='hidden' value='0'></input>";


						 }else{
	 						 	echo "<a style='color:red'>No Cumple</a>";
								//echo "<input id='obligatorio' type='hidden' value='0'></input>";
								echo "<input id='obligatorio2' type='hidden' value='1'></input>";
							

						 }

 				 
					 
					  ?>
                     
                      
                      </td>
                      </tr>
                      
                   
                    <?php } while ($row_tramitexcurso = mysql_fetch_assoc($tramitexcurso)); ?>
                     
                      <?php 
				$query_tramitexcurso = "select a.id_curso,a.nom_curso,c.nombre,b.horasxcurso,b.horasxmanejo from curso a, cursosxtramite b,tramite c where a.id_curso=b.id_curso and c.id_tramite=b.id_tramite and c.id_tramite=".$row_obtener_tramite['id_tramite'];
				$tramitexcurso = mysql_query($query_tramitexcurso, $brevete) or die(mysql_error());
				$row_tramitexcurso = mysql_fetch_assoc($tramitexcurso);
				
				?>
					 
                       <tr>
                         <td bgcolor="#C6ECFF" class="parrafo_negro_pequeno">Horas de Practica</td>
                         <td bgcolor="#FFFFFF" class="parrafo_negro_pequeno">Practica de Manejo</td>
                         <td bgcolor="#FFFFFF" class="parrafo_negro_pequeno">
						 <?php 
						 echo $row_tramitexcurso['horasxmanejo']." horas";
						 ?>
                         </td>
                         <td bgcolor="#FFFFFF" class="parrafo_negro_pequeno">
                         <?php 
						 if($row_todo_certificados['horas_practica']=$row_tramitexcurso['horasxmanejo']){
	 						 	echo "<a style='color:blue'>Cumple</a>";
								echo "<input id='obligatorio' type='hidden' value='0'></input>";
								
								$incompleto = 0;
							 }else{
	 						 	echo "<a style='color:red'>No Cumple</a>";
								echo "<input id='obligatorio2' type='hidden' value='1'></input>";

								$incompleto = 1;
								 }
							 
//						 echo $row_todo_certificados['horas_practica'] 
						 ?>
                        
                         
                         
                         </td>
                       </tr>
                </table>
              </fieldset></td>
            </tr>
          </table></td>
        </tr>
      </table></th>
    </tr>
  </table>
  <br />
  <input type="hidden" name="MM_update" value="form1" />
</form>
<div class="overlay" id="overlay" style="display:none;"></div>

<div class="box" id="box"> <a class="boxclose" id="boxclose"></a>
  <h1>Agregar Practica de Manejo </h1>
  <form id="form3" name="form3" method="post" action="insertar_practica_manejo.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left"><br />
          <table width="342" border="1" cellpadding="5" cellspacing="0" bordercolor="#C6ECFF">
          <tr>
            <th width="14%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_small" scope="col">Codigo</th>
            <th width="14%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_small" scope="col">Horas</th>
            <th width="14%" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Nota</th>
            <th width="58%" align="center" bgcolor="#C6ECFF" scope="col"><span class="parrafo_negro_small">Fecha</span></th>
          </tr>
          <tr>
            <th align="center" bgcolor="#FFFFFF" class="parrafo_negro_small" scope="col"><input name="codigo_practicas" type="text" class="textbox_small" id="codigo_practicas" value="<?php echo $row_maxid_practica_manejo['MAX(registro_practicas.id)']+1; ?>" readonly="readonly" /></th>
            <th align="center" bgcolor="#FFFFFF" class="parrafo_negro_small" scope="col"><input name="hora_practicas" type="number" class="textbox_small" id="hora_practicas" /></th>
            <th align="center" bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><input name="nota_practicas" type="number" class="textbox_small" id="nota_practicas" /></th>
            <th align="center" bgcolor="#FFFFFF" scope="col"><input type="date" name="fecha_practicas" id="fecha_practicas" /></th>
          </tr>
          <?php do { ?>
          <?php } while ($row_practicas_manejo = mysql_fetch_assoc($practicas_manejo)); ?>
        </table></td>
      </tr>
      <tr>
        <td align="left"><table width="460" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="left" class="parrafo_negro"><input name="code_certification" type="hidden" id="code_certification" readonly="readonly" value="<?php echo $row_todo_certificados['codigo_certificado']?>"/>
              <input type="submit" name="button3" id="button3" value="Grabar" />
              <input type="reset" name="button6" id="button6" value="Limpiar" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <br />
  </form>
  <form name="form3" method="post" action="insertar_cursos.php">
    <table width="900" border="0" cellspacing="0" cellpadding="5">
      <tr> </tr>
    </table>
  </form>
  <br />
</div>
<div class="overlay2" id="overlay2" style="display:none;"></div>

<div class="box2" id="box2"> <a class="boxclose2" id="boxclose2"></a>
  <h1>Agregar Curso Teoria</h1>
  <form id="form2" name="form3" method="post" action="insertar_cursos_teoria.php">
    <br />
    <table width="848" border="1" cellspacing="0" cellpadding="5" bordercolor="#C6ECFF">
      <tr bordercolor="#C6ECFF">
        <th width="104" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Curso</th>
        <th width="50" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Nota</th>
        <th width="224" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Fecha Inicio</th>
        <th width="144" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Fecha Fin</th>
        <th width="144" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Horas</th>
        <th width="108" align="center" bgcolor="#C6ECFF" class="parrafo_negro_pequeno" scope="col">Local</th>
      </tr>
      <tr>
        <td class="parrafo_negro"><label for="cb_curso2"></label>
          <select name="cb_curso2" id="cb_curso2">
            <option value="0">Seleccionar</option>
            <?php
do {  
?>
            <option value="<?php echo $row_agregar_curso_teoria['id_curso']?>"><?php echo $row_agregar_curso_teoria['nom_curso']?></option>
            <?php
} while ($row_agregar_curso_teoria = mysql_fetch_assoc($agregar_curso_teoria));
  $rows = mysql_num_rows($agregar_curso_teoria);
  if($rows > 0) {
      mysql_data_seek($agregar_curso_teoria, 0);
	  $row_agregar_curso_teoria = mysql_fetch_assoc($agregar_curso_teoria);
  }
?>
        </select></td>
        <td class="parrafo_negro"><span class="parrafo_negro_pequeno">
          <input name="nota_teoria" type="number" class="textbox_small" id="nombre_curso_add" />
        </span></td>
        <td class="parrafo_negro"><span class="parrafo_negro_pequeno">
          <input type="date" name="hora_inicio2" id="hora_inicio" />
        </span></td>
        <td class="parrafo_negro"><input type="date" name="hora_fin2" id="hora_fin" /></td>
        <td class="parrafo_negro"><label for="horas"></label>
        <input type="number" name="horas" id="horas" /></td>
        <td class="parrafo_negro"><label for="select2"></label>
          <select name="local" id="select2">
            <option value="0">Seleccionar</option>
            <option value="Los Olivos">Los Olivos</option>
        </select></td>
      </tr>
    </table>
    <table width="848" border="0" cellspacing="7" cellpadding="0">
      <tr>
        <td align="right"><span class="parrafo_negro">
          <label for="ct_code_capacitacion"></label>
          <label for="tramite"></label>
          <input name="code_certification" type="hidden" id="code_certification" readonly="readonly" value="<?php echo $row_todo_certificados['codigo_certificado']?>"/>
          <input type="submit" name="button4" id="button4" value="Grabar" />
          <input type="reset" name="button" id="button5" value="Limpiar" />
        </span></td>
      </tr>
    </table>
  </form>
  <form action="insertar_cursos.php" method="post" name="form3" id="form2">
    <table width="900" border="0" cellspacing="0" cellpadding="5">
      <tr> </tr>
    </table>
  </form>
</div>
<p>&nbsp;</p>

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
</script>

<script type="text/javascript">
$(function() {
    $('#activator2').click(function(){
        $('#overlay2').fadeIn('fast',function(){
            $('#box2').animate({'top':'160px'},500);
        });
    });
    $('#boxclose2').click(function(){
        $('#box2').animate({'top':'-500px'},500,function(){
            $('#overlay2').fadeOut('fast');
        });
    });

});
</script>

</body>
</html>
<?php
mysql_free_result($todo_tramites);

mysql_free_result($todos_cursos);

mysql_free_result($agregar_curso_teoria);

mysql_free_result($maxid_practica_manejo);

mysql_free_result($todo_capacitacion);

//mysql_free_result($todo_tramites);

mysql_free_result($todo_certificados);

mysql_free_result($postulantes);

mysql_free_result($practicas_manejo);

mysql_free_result($certificados);
?>
