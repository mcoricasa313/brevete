<?php 

session_start(); 

$tipo_user = $_SESSION['tipo_user'];

?>

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

mysql_select_db($database_brevete, $brevete);
$query_Recordset1 = "SELECT * FROM profesor";
$Recordset1 = mysql_query($query_Recordset1, $brevete) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


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



/*

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  $insertSQL = sprintf("INSERT INTO registro_capacitacion (id_capacitacion, id_curso, nota, curso_inicio, curso_fin, `local`, horas_practica, nota_practica, fecha_practica) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",

                       GetSQLValueString($_POST['id_capacitacion'], "int"),

                       GetSQLValueString($_POST['id_curso'], "int"),

                       GetSQLValueString($_POST['nota'], "int"),

                       GetSQLValueString($_POST['curso_inicio'], "date"),

                       GetSQLValueString($_POST['curso_fin'], "date"),

                       GetSQLValueString($_POST['local'], "text"),

                       GetSQLValueString($_POST['horas_practica'], "text"),

                       GetSQLValueString($_POST['nota_practica'], "text"),

                       GetSQLValueString($_POST['fecha_practica'], "date"));



  mysql_select_db($database_brevete, $brevete);

  $Result1 = mysql_query($insertSQL, $brevete) or die(mysql_error());

}

*/

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



$horas_teoria[1] = $_POST['horas_teoria'];

$horas_teoria[2] = $_POST['horas_teoria2'];

$horas_teoria[3] = $_POST['horas_teoria3'];

$horas_teoria[4] = $_POST['horas_teoria4'];

$horas_teoria[5] = $_POST['horas_teoria5'];

$horas_teoria[6] = $_POST['horas_teoria6'];

$horas_teoria[7] = $_POST['horas_teoria7'];

$horas_teoria[8] = $_POST['horas_teoria8'];

$horas_teoria[9] = $_POST['horas_teoria9'];

$horas_teoria[10] = $_POST['horas_teoria10'];

$horas_teoria[11] = $_POST['horas_teoria11'];

$horas_teoria[12] = $_POST['horas_teoria12'];

$horas_teoria[13] = $_POST['horas_teoria13'];



	

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



$horas_practica[1] = $_POST["horas_practica"];

$horas_practica[2] = $_POST["horas_practica2"];

$horas_practica[3] = $_POST["horas_practica3"];

$horas_practica[4] = $_POST["horas_practica4"];

$horas_practica[5] = $_POST["horas_practica5"];

$horas_practica[6] = $_POST["horas_practica6"];

$horas_practica[7] = $_POST["horas_practica7"];

$horas_practica[8] = $_POST["horas_practica8"];

$horas_practica[9] = $_POST["horas_practica9"];

$horas_practica[10] = $_POST["horas_practica10"];

$horas_practica[11] = $_POST["horas_practica11"];

$horas_practica[12] = $_POST["horas_practica12"];

$horas_practica[13] = $_POST["horas_practica13"];



$nota_practica[1] = $_POST["nota_practica"];

$nota_practica[2] = $_POST["nota_practica2"];

$nota_practica[3] = $_POST["nota_practica3"];

$nota_practica[4] = $_POST["nota_practica4"];

$nota_practica[5] = $_POST["nota_practica5"];

$nota_practica[6] = $_POST["nota_practica6"];

$nota_practica[7] = $_POST["nota_practica7"];

$nota_practica[8] = $_POST["nota_practica8"];

$nota_practica[9] = $_POST["nota_practica9"];

$nota_practica[10] = $_POST["nota_practica10"];

$nota_practica[11] = $_POST["nota_practica11"];

$nota_practica[12] = $_POST["nota_practica12"];

$nota_practica[13] = $_POST["nota_practica13"];





$fecha_practica[1] = $_POST["fecha_practica"];

$fecha_practica[2] = $_POST["fecha_practica2"];

$fecha_practica[3] = $_POST["fecha_practica3"];

$fecha_practica[4] = $_POST["fecha_practica4"];

$fecha_practica[5] = $_POST["fecha_practica5"];

$fecha_practica[6] = $_POST["fecha_practica6"];

$fecha_practica[7] = $_POST["fecha_practica7"];

$fecha_practica[8] = $_POST["fecha_practica8"];

$fecha_practica[9] = $_POST["fecha_practica9"];

$fecha_practica[10] = $_POST["fecha_practica10"];

$fecha_practica[11] = $_POST["fecha_practica11"];

$fecha_practica[12] = $_POST["fecha_practica12"];

$fecha_practica[13] = $_POST["fecha_practica13"];





$codigo_certificado = $_POST["id_capacitacion"];





for($i=1;$i<14;$i++){



$insertar_practicas = "insert into registro_practicas(horas,nota,fecha,codigo_certificado) values(".$horas_practica[$i].",".$nota_practica[$i].",'".$fecha_practica[$i]."',".$codigo_certificado.")";

mysql_query($insertar_practicas);





  $insertSQL = sprintf("INSERT INTO registro_capacitacion (doc_identidad, id_curso, nota, curso_inicio, curso_fin, local, codigo_certificado,horas_teoria) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",

                       //GetSQLValueString($_POST['id_capacitacion'], "int"),

                       GetSQLValueString($_POST['documento_postulante'], "int"),

                       GetSQLValueString($id_curso[$i], "int"),

//                       GetSQLValueString($_POST['nota'], "int"),

                       GetSQLValueString($nota[$i], "int"),

                       GetSQLValueString($curso_inicio[$i], "date"),

                       GetSQLValueString($curso_fin[$i], "date"),

                       GetSQLValueString($_POST['local'], "text"),

                      // GetSQLValueString($_POST['horas_practica'], "text"),

                      // GetSQLValueString($_POST['nota_practica'], "text"),

                       //GetSQLValueString($_POST['fecha_practica'], "date"),

                       GetSQLValueString($_POST['id_capacitacion'], "int"),

					   GetSQLValueString($horas_teoria[$i], "int"));

  mysql_select_db($database_brevete, $brevete);

  $Result1 = mysql_query($insertSQL, $brevete) or die(mysql_error());

//aqui termina el for

}

$fecha_inicio = $_POST["fecha_inicio_impresion"];

$fecha_fin  = $_POST["fecha_final_impresion"];

$prom_teoria = $_POST["promedio"];

$prom_practicas = $_POST["promedio_practica"];

$horas_teoria = $_POST["total_horas_teoria"];

$horas_practica = $_POST["total_horas_practica"];

$postulante = $_POST["documento_postulante"];



$insertar_datos_impresion = "insert into certificados(codigo_certificado,fecha_inicio,fecha_fin,prom_teoria,prom_practicas,horas_teoria,horas_practica,postulante,idprofesor,especialidad2) VALUES($codigo_certificado, '".$fecha_inicio."', '".$fecha_fin."', ".$prom_teoria.", ".$prom_practicas.", ".$horas_teoria.", ".$horas_practica.", ".$postulante.")";

mysql_query($insertar_datos_impresion);





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

//$totalPages_Recordset_capacitacion = ceil($totalRows_Recordset_capacitacion/mysql_select_db($database_brevete, $brevete);

$query_Recordset_capacitacion = "SELECT MAX( registro_capacitacion.codigo_certificado) FROM registro_capacitacion";

$Recordset_capacitacion = mysql_query($query_Recordset_capacitacion, $brevete) or die(mysql_error());

$row_Recordset_capacitacion = mysql_fetch_assoc($Recordset_capacitacion);

$totalRows_Recordset_capacitacion = mysql_num_rows($Recordset_capacitacion);



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

$query_tramitexcurso = "SELECT * FROM cursosxtramite WHERE cursosxtramite.id_tramite=1";

$tramitexcurso = mysql_query($query_tramitexcurso, $brevete) or die(mysql_error());

$row_tramitexcurso = mysql_fetch_assoc($tramitexcurso);

$totalRows_tramitexcurso = mysql_num_rows($tramitexcurso);



mysql_select_db($database_brevete, $brevete);



?>

<?php 

date_default_timezone_set("America/Lima");

?>

<?php //include("insertar_cursos.php")?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:spry="http://ns.adobe.com/spry">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">



<link href="css/estilos.css" type="text/css" rel="stylesheet"/>



<title>Registro de capacitaciones</title>

<style type="text/css"></style>

<script src="SpryAssets/SpryData.js" type="text/javascript"></script>

<script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>



<script type="text/javascript" src="js/comparar_fechas.js"></script>

<script type="text/javascript">

var ds1 = new Spry.Data.HTMLDataSet("persistencia/locales.html", "tramite", {sortOnLoad: "Id", sortOrderOnLoad: "ascending"});

var persistencia_curso = new Spry.Data.HTMLDataSet("persistencia/cursos.html", "tramite", {sortOnLoad: "Id", sortOrderOnLoad: "ascending"});

</script>

<script type="text/javascript">

document.getElementById("fila10").style.display ="none";

document.getElementById("fila11").style.display = "none";

document.getElementById("fila12").style.display = "none";

document.getElementById("fila13").style.display = "none";

document.getElementById("fila14").style.display = "none";

document.getElementById("fila15").style.display = "none";



</script>



<script type="text/javascript"></script>

<script type="text/javascript" src="js/BotonActionController.js"></script>





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

        <td bgcolor="#999999"><table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-color:#666">

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

						if(isset($_GET['doc'])){

							$prueba = $_GET['doc'];							

						}else{

							$prueba = "0";

							}

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

                  <input type="submit" name="buscarxdni" id="buscarxdni" value="Buscar" onclick="capturar_dni();" />

                  <br />

                  <span class="textfieldRequiredMsg">Se necesita el documento de identidad.</span><span class="textfieldInvalidFormatMsg">Formato no valido.</span></span></th>

                <?php 

		  $documento = "";

		  $documento = $row_Recordset1['num_documento'];

			  ?>

                <th width="53%" align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>

              </tr>

              <tr>

                <td align="left" bgcolor="#E2E2E2" style="color: #000">Nombres</td>

                <td colspan="2" bgcolor="#E2E2E2"><label for="nombres_postulante6"></label>

                  <input name="nombres_postulante" type="text" id="nombres_postulante6" size="100" readonly="readonly" <?php echo "value='".$row_Recordset1['nom_postulante']."'"?> /></td>

              </tr>

              <tr>

                <td align="left" bgcolor="#E2E2E2" style="color: #000">Tramite</td>

                <td colspan="2" bgcolor="#E2E2E2">

                <?php 

				$flag = 0;

				$valor = "";

				?>

                  <?php do { ?>

                  <?php if($row_Recordset1['id_tramite'] ==  $row_persistencia_tramite['id_tramite']){ ?>

                	

                   <?php $flag = 1; ?>

                    <?php $valor =$row_persistencia_tramite['nombre']; ?>

                  <?php }?>

                 

               <?php } while ($row_persistencia_tramite = mysql_fetch_assoc($persistencia_tramite)); ?>

   

		    <?php if($flag=1){?>

<input name="tramite_postulante" type="text" id="tramite_postulante6" size="100" readonly="readonly" <?php echo "value='".$valor."'";?>  />

   				<?php }else{?>

                <input name="" type="text" />

                <?php }?>

   				</td>

              </tr>

            </table>

            <input type="hidden" name="identificador_tramite" id="identificador_tramite" <?php echo "value='".$row_Recordset1['id_tramite']."'";?>/>

            <br />

          </fieldset></td>

        </tr>

        <tr>

          <td bgcolor="#E2E2E2">

		 

          </td>

        </tr>

      </table>

    </form></td>

  </tr>

  <tr>

    <td><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">

      <table width="100%" border="0" cellspacing="0" cellpadding="0" frame="">

        <tr>

          <td bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="5">

            <tr>

              <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="3">

                <tr>

                  <td width="64%" align="left" valign="top"><fieldset>

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

                        <th style="color: #000" scope="col">Nota</th>

                        <th style="color: #000" scope="col">Horas</th>

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

                          <input name="nota" type="number" id="nota" size="3"  max="20"/></td>

                        <td width="8%"><input name="horas_teoria" type="number" id="horas_teoria" size="3" /></td>

                        <td width="22%"><label for="horas_teoria"></label>

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

                        <td><input name="horas_teoria2" type="number" id="horas_teoria2" size="3" /></td>

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

                        <td><input name="horas_teoria3" type="number" id="horas_teoria3" size="3" /></td>

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

                        <td><input name="horas_teoria4" type="number" id="horas_teoria4" size="3" /></td>

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

                        <td><input name="horas_teoria5" type="number" id="horas_teoria5" size="3" /></td>

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

                        <td><input name="horas_teoria6" type="number" id="horas_teoria6" size="3" /></td>

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

                        <td align="left"><input name="horas_teoria7" type="number" id="horas_teoria7" size="3" /></td>

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

                        <td align="left"><input name="horas_teoria8" type="number" id="horas_teoria8" size="3" /></td>

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

                        <td align="left"><input name="horas_teoria9" type="number" id="horas_teoria9" size="3" /></td>

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

                        <td align="left"><input name="horas_teoria10" type="number" id="horas_teoria10" size="3" /></td>

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

                        <td align="left"><input name="horas_teoria11" type="number" id="horas_teoria11" size="3" /></td>

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

                        <td align="left"><input name="horas_teoria12" type="number" id="horas_teoria12" size="3" /></td>

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

                        <td align="left"><input name="horas_teoria13" type="number" id="horas_teoria13" size="3" /></td>

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

                        <td><input name="id_capacitacion" type="text" id="id_capacitacion" value="<?php				$relleno = $row_Recordset_capacitacion['MAX( registro_capacitacion.codigo_certificado)']+1;

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

                        <td><input type="button" name="calcular" id="calcular" value="Calcular" onclick="datos_impresion();" style="background:#C90"/></td>

                        <td>&nbsp;</td>

                      </tr>

                    </table>

                  </fieldset></td>

                  <td width="36%" align="left" valign="top"><fieldset>

                    <legend style="color: #000">Resultados</legend>

                    <br />

                    <table width="100%" border="0" cellspacing="5" cellpadding="0">

                      <tr>

                        <th colspan="5" scope="col"><span style="color: #000">Practicas de manejo</span></th>

                      </tr>

                      <tr>

                        <td width="22%" style="color: #000">Horas </td>

                        <td width="23%"><span style="color: #000">Nota</span></td>

                        <td width="24%"><span style="color: #000">Fecha</span></td>

                        <td width="31%"><span style="color: #000">Locales</span></td>

                        <td width="31%">&nbsp;</td>

                      </tr>

                      <tr id="practicas_fila1">

                        <td><input name="horas_practica" type="text" id="horas_practica" size="2" /></td>

                        <td><input name="nota_practica" type="text" id="nota_practica" size="2" /></td>

                        <td><input type="date" name="fecha_practica" id="fecha_practica" /></td>

                        <td><div spry:region="ds1">

                          <select name="select27" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td>&nbsp;</td>

                      </tr>

                      <tr id="practicas_fila2">

                        <td><input name="horas_practica2" type="text" id="horas_practica2" size="2" /></td>

                        <td><input name="nota_practica2" type="text" id="nota_practica2" size="2" /></td>

                        <td><input type="date" name="fecha_practica2" id="fecha_practica2" /></td>

                        <td><div spry:region="ds1">

                          <select name="select2" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" width="20" height="20" onclick="eliminar_practica_fila2();"/></td>

                      </tr>

                      <tr id="practicas_fila3">

                        <td><input name="horas_practica3" type="text" id="horas_practica3" size="2" /></td>

                        <td><input name="nota_practica3" type="text" id="nota_practica3" size="2" /></td>

                        <td><input type="date" name="fecha_practica3" id="fecha_practica3" /></td>

                        <td><div spry:region="ds1">

                          <select name="select3" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila3();"/></td>

                      </tr>

                      <tr id="practicas_fila4">

                        <td><input name="horas_practica4" type="text" id="horas_practica4" size="2" /></td>

                        <td><input name="nota_practica4" type="text" id="nota_practica4" size="2" /></td>

                        <td><input type="date" name="fecha_practica4" id="fecha_practica4" /></td>

                        <td><div spry:region="ds1">

                          <select name="select4" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila4();"/></td>

                      </tr>

                      <tr id="practicas_fila5">

                        <td><input name="horas_practica5" type="text" id="horas_practica5" size="2" /></td>

                        <td><input name="nota_practica5" type="text" id="nota_practica5" size="2" /></td>

                        <td><input type="date" name="fecha_practica5" id="fecha_practica5" /></td>

                        <td><div spry:region="ds1">

                          <select name="select5" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila5();" /></td>

                      </tr>

                      <tr id="practicas_fila6">

                        <td><input name="horas_practica6" type="text" id="horas_practica6" size="2" /></td>

                        <td><input name="nota_practica6" type="text" id="nota_practica6" size="2" /></td>

                        <td><input type="date" name="fecha_practica6" id="fecha_practica6" /></td>

                        <td><div spry:region="ds1">

                          <select name="select6" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila6();"/></td>

                      </tr>

                      <tr id="practicas_fila7">

                        <td><input name="horas_practica7" type="text" id="horas_practica7" size="2" /></td>

                        <td><input name="nota_practica7" type="text" id="nota_practica7" size="2" /></td>

                        <td><input type="date" name="fecha_practica7" id="fecha_practica7" /></td>

                        <td><div spry:region="ds1">

                          <select name="select12" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila7();"/></td>

                      </tr>

                      <tr id="practicas_fila8">

                        <td><input name="horas_practica8" type="text" id="horas_practica8" size="2" /></td>

                        <td><input name="nota_practica8" type="text" id="nota_practica8" size="2" /></td>

                        <td><input type="date" name="fecha_practica8" id="fecha_practica8" /></td>

                        <td><div spry:region="ds1">

                          <select name="select19" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila8();"/></td>

                      </tr>

                      <tr id="practicas_fila9">

                        <td><input name="horas_practica9" type="text" id="horas_practica9" size="2" /></td>

                        <td><input name="nota_practica9" type="text" id="nota_practica9" size="2" /></td>

                        <td><input type="date" name="fecha_practica9" id="fecha_practica9" /></td>

                        <td><div spry:region="ds1">

                          <select name="select20" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila9();"/></td>

                      </tr>

                      <tr id="practicas_fila10">

                        <td><input name="horas_practica10" type="text" id="horas_practica10" size="2" /></td>

                        <td><input name="nota_practica10" type="text" id="nota_practica10" size="2" /></td>

                        <td><input type="date" name="fecha_practica10" id="fecha_practica10" /></td>

                        <td><div spry:region="ds1">

                          <select name="select21" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila10();"/></td>

                      </tr>

                      <tr id="practicas_fila11">

                        <td><input name="horas_practica11" type="text" id="horas_practica11" size="2" /></td>

                        <td><input name="nota_practica11" type="text" id="nota_practica11" size="2" /></td>

                        <td><input type="date" name="fecha_practica11" id="fecha_practica11" /></td>

                        <td><div spry:region="ds1">

                          <select name="select22" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila11();"/></td>

                      </tr>

                      <tr id="practicas_fila12">

                        <td><input name="horas_practica12" type="text" id="horas_practica12" size="2" /></td>

                        <td><input name="nota_practica12" type="text" id="nota_practica12" size="2" /></td>

                        <td><input type="date" name="fecha_practica12" id="fecha_practica12" /></td>

                        <td><div spry:region="ds1">

                          <select name="select23" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila12();"/></td>

                      </tr>

                      <tr id="practicas_fila13">

                        <td><input name="horas_practica13" type="text" id="horas_practica13" size="2" /></td>

                        <td><input name="nota_practica13" type="text" id="nota_practica13" size="2" /></td>

                        <td><input type="date" name="fecha_practica13" id="fecha_practica13" /></td>

                        <td><div spry:region="ds1">

                          <select name="select24" spry:repeatchildren="ds1">

                            <option value="{Local}">{Local}</option>

                          </select>

                        </div></td>

                        <td><img src="img/multiplication.png" alt="" width="20" height="20" onclick="eliminar_practica_fila13();"/></td>

                      </tr>

                      <tr>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                        <td><input type="button" name="btn_prac2" id="btn_prac2" value="Agregar2" onclick="agregar_practica_fila2()"/>

                          <input type="button" name="btn_prac3" id="btn_prac3" value="Agregar3" onclick="agregar_practica_fila3()" />

                          <input type="button" name="btn_prac4" id="btn_prac4" value="Agregar4" onclick="agregar_practica_fila4()"/>

                          <input type="button" name="btn_prac5" id="btn_prac5" value="Agregar5" onclick="agregar_practica_fila5()"/>

                          <input type="button" name="btn_prac6" id="btn_prac6" value="Agregar6" onclick="agregar_practica_fila6()"/>

                          <input type="button" name="btn_prac7" id="btn_prac7" value="Agregar7" onclick="agregar_practica_fila7()"/>

                          <input type="button" name="btn_prac8" id="btn_prac8" value="Agregar8" onclick="agregar_practica_fila8()"/>

                          <input type="button" name="btn_prac9" id="btn_prac9" value="Agregar9" onclick="agregar_practica_fila9()"/>

                          <input type="button" name="btn_prac10" id="btn_prac10" value="Agregar10" onclick="agregar_practica_fila10()"/>

                          <input type="button" name="btn_prac11" id="btn_prac11" value="Agregar11" onclick="agregar_practica_fila11()"/>

                          <input type="button" name="btn_prac12" id="btn_prac12" value="Agregar12" onclick="agregar_practica_fila12()"/>

                          <input type="button" name="btn_prac13" id="btn_prac13" value="Agregar13" onclick="agregar_practica_fila13()"/></td>

                        <td>&nbsp;</td>

                      </tr>

                    </table>

                  </fieldset></td>

                </tr>

                <tr>

                  <td colspan="2" align="left"><fieldset style="color: #000">

                    <legend>Datos de impresion</legend>

                    <br />

                    <table width="100%" border="0" cellspacing="5" cellpadding="0">

                      <tr>

                        <th width="15%" align="left" style="color: #000" scope="col">N&ordm; Cerificado</th>

                        <th width="21%" align="left" scope="col"><label for="certificado_impresion2"></label>

                          <input type="text" name="certificado_impresion" id="certificado_impresion" /></th>

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
                        <td align="left" style="color: #000">Profesor </td>
                        <td align="left"><label for="select4"></label>
                          <select name="nombres" id="select4">
                            <option value="-1">Seleccionar</option>
                            <?php
do {  
?>
                            <option value="<?php echo $row_Recordset1['idprofesor']?>"><?php echo $row_Recordset1['nombres']?></option>
                            <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                          </select></td>
                        <td align="left" style="color: #000">Calificacion Profesor</td>
                        <td align="left"><label for="select5"></label>
                          <select name="select25" id="select5">
                            <option value="Seleccionar">Seleccionar</option>
                            <option value="Bueno">Bueno</option>
                            <option value="Malo">Malo</option>
                            <option value="Regular">Regular</option>
                          </select></td>
                        <td align="left">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>

                        <td align="left" style="color: #000">Promedio Teoria</td>

                        <td align="left"><label for="promedio_practica"></label>

                          <span id="sprytextfield4">

                          <input name="promedio" type="text" id="promedio" size="5" maxlength="3" />

                          <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>

                        <td width="14%" align="left" style="color: #000">Horas de Teoria</td>

                        <td align="left"><input name="total_horas_teoria" type="text" id="total_horas_teoria" size="5" maxlength="3" /></td>

                        <td align="left">&nbsp;</td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                        <td>&nbsp;</td>

                      </tr>

                      <tr>

                        <td width="15%" align="left" style="color: #000">Promedio Practicas</td>

                        <td align="left"><input name="promedio_practica" type="text" id="promedio_practica" size="5" maxlength="3" /></td>

                        <td width="14%" align="left" style="color: #000">Horas de Practica</td>

                        <td align="left"><input name="total_horas_practica" type="text" id="total_horas_practica" size="5" maxlength="3" /></td>

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

      <input type="hidden" name="MM_insert" value="form1" />

    </form></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>











<div class="overlay" id="overlay" style="display:none;"></div>



<div class="box" id="box">

 <a class="boxclose" id="boxclose"></a>

 <h1>Agregar Curso</h1>

 <form id="form3" name="form3" method="POST" action="insertar_cursos2.php">

   <br />

   <table width="900" border="0" cellspacing="0" cellpadding="5">

     <tr>

       <td width="135" class="parrafo_negro">Nombre</td>

       <td width="346"><label for="nombre_curso_add"></label>

         <span id="sprytextfield1">

         <input type="text" name="nombre_curso_add" id="nombre_curso_add" />

        <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>

       <td width="67" class="parrafo_negro">Local </td>

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

       <td class="parrafo_negro"><input type="submit" name="button" id="button" value="Grabar" />

        <input type="reset" name="button6" id="button6" value="Limpiar" /></td>

       <td><input type="hidden" name="documento_postulante2" id="documento_postulante2" value="<?php echo $documento;?>"  /></td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

       <td>&nbsp;</td>

     </tr>

    </table>

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

var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");

</script>





</body>

</html>

<?php

mysql_free_result($Recordset_capacitacion);



mysql_free_result($persistencia_tramite);



mysql_free_result($Recordset1);



mysql_free_result($cursos);



mysql_free_result($tramitexcurso);

?>

