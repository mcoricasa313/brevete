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



$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {

  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);

}



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  $insertSQL = sprintf("INSERT INTO postulantes (nom_postulante, fecha_nac, fecha_medico, id_tramite, num_licencia, id_tipodoc, num_documento, ds_direccion, st_anulado, email) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",

                       GetSQLValueString($_POST['txt_nombres'], "text"),

                       GetSQLValueString($_POST['datepicker'], "date"),

                       GetSQLValueString($_POST['datepicker2'], "date"),

                       GetSQLValueString($_POST['select2'], "text"),

                       GetSQLValueString($_POST['txt_licencia'], "text"),

                       GetSQLValueString($_POST['id_tipodoc'], "text"),

                       GetSQLValueString($_POST['txt_dni'], "text"),

                       GetSQLValueString($_POST['txt_direccion'], "text"),

                       GetSQLValueString($_POST['st_anulado'], "text"),

                       GetSQLValueString($_POST['txt_mail'], "text"));



  mysql_select_db($database_brevete, $brevete);

  $Result1 = mysql_query($insertSQL, $brevete) or die(mysql_error());

	$mensaje_confirmacion="Registro Satisfactorio del Postulante...";

  $insertGoTo = "registro_postulantes.php?mensaje_confirmacion=$mensaje_confirmacion";

  if (isset($_SERVER['QUERY_STRING'])) {

    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";

    $insertGoTo .= $_SERVER['QUERY_STRING'];

  }

  header(sprintf("Location: %s", $insertGoTo));

}



mysql_select_db($database_brevete, $brevete);

$query_max_codigo_postulante = "SELECT MAX(cod_postulante) FROM postulantes";

$max_codigo_postulante = mysql_query($query_max_codigo_postulante, $brevete) or die(mysql_error());

$row_max_codigo_postulante = mysql_fetch_assoc($max_codigo_postulante);

$totalRows_max_codigo_postulante = mysql_num_rows($max_codigo_postulante);



mysql_select_db($database_brevete, $brevete);

$query_tramites = "SELECT * FROM tramite order by indice asc";

$tramites = mysql_query($query_tramites, $brevete) or die(mysql_error());

$row_tramites = mysql_fetch_assoc($tramites);

$totalRows_tramites = mysql_num_rows($tramites);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:spry="http://ns.adobe.com/spry">

<head>

<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



 <link rel="stylesheet" href="jquery/jquery-ui.css">

  <script src="jquery/jquery-1.10.2.js"></script>

  <script src="jquery/jquery-ui.js"></script>

<script src="SpryAssets/SpryData.js" type="text/javascript"></script>

  <script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>

  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

  <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

  <script>

  /*$(function() {

    $( "#datepicker" ).datepicker({

      showOn: "button",

      buttonImage: "img/calendar.gif",

      buttonImageOnly: true,

      buttonText: "Select date"

    });

	 $('#datepicker').datepicker('option', {dateFormat: 'yy-mm-dd'});

  });

  */

  </script>



<script>

/*

$(function() {

    $( "#datepicker2" ).datepicker({

      showOn: "button",

      buttonImage: "img/calendar.gif",

      buttonImageOnly: true,

      buttonText: "Select date"

    });

		 $('#datepicker2').datepicker('option', {dateFormat: 'yy-mm-dd'});

  });

  */

var tramite = new Spry.Data.HTMLDataSet("persistencia/tramite.html", "tramite", {useCache: false});

var tipo_documento = new Spry.Data.HTMLDataSet("persistencia/tipo_documento.html", "tipo_documento", {sortOnLoad: "Id", sortOrderOnLoad: "ascending"});

</script>

<script type="text/javascript">

function bloquear_licencia(){

	if(document.getElementById("tramite").value>11){

		document.getElementById("txt_licencia").setAttribute('disabled','disabled');

	}else{

		document.getElementById("txt_licencia").removeAttribute('disabled');

	}



}





</script>





<script type="text/javascript" src="js/BotonActionController.js"></script>



<title>Registrar Postulantes</title>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

</head>



<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <th align="center" scope="col"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">

      <table width="800" border="0" cellspacing="0" cellpadding="0" frame="border">

        <tr>

          <th align="left" bgcolor="#999999" scope="col"> <span style="color: #999">X </span><span style="color: #FFF">Registro de Postulantes</span></th>

        </tr>

        <tr>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <th align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>

            </tr>

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

          <td><table width="100%" border="0" cellspacing="0" cellpadding="8">

            <tr>

              <th bgcolor="#E2E2E2" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="3">

                <tr>

                  <th width="230" align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000" scope="col">Codigo</th>

                  <th align="left" bgcolor="#E2E2E2" scope="col"><label for="textfield"></label>

                    <input name="txt_codigo" type="text" disabled="disabled" id="textfield" value="<?php echo $row_max_codigo_postulante['MAX(cod_postulante)']+1; ?>" size="10" readonly="readonly" /></th>

                  <th align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>

                  <th align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>

                  <th align="left" bgcolor="#E2E2E2" scope="col">&nbsp;</th>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">Nombres</td>

                  <td colspan="4" align="left" bgcolor="#E2E2E2"><label for="txt_nombres"></label>

                    <span id="sprytextfield1">

                    <input name="txt_nombres" type="text" id="txt_nombres" size="90" onkeypress="return soloLetras(event)"/>

                    <span class="textfieldRequiredMsg">Debe ingresar el nombre del postulante.</span></span></td>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">Tramite</td>

                  <td align="left" bgcolor="#E2E2E2"><span id="val_tramite">

                    <label for="cb_tipodoc2">

                      <select name="select2" spry:repeatchildren="tramite" id="tramite" onchange="bloquear_licencia();">

                        <option value="0">Seleccionar</option>

                        <?php do { ?>

                        

                        <option value="<?php echo $row_tramites['id_tramite']?>"><?php echo $row_tramites['nombre']?></option>



                        <?php

} while ($row_tramites = mysql_fetch_assoc($tramites));

  $rows = mysql_num_rows($tramites);

  if($rows > 0) {

      mysql_data_seek($tramites, 0);

	  $row_tramites = mysql_fetch_assoc($tramites);

  }

?>

                      </select>

                    </label>

                    <span class="selectInvalidMsg"><br />

                    Seleccione un elemento .</span><span class="selectRequiredMsg"><br />

                    Seleccione un elemento.</span></span></td>

                  <td width="99" align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">N° Licencia</td>

                  <td align="left" bgcolor="#E2E2E2"><label for="txt_licencia"></label>

                    <span id="sprytextfield4">

                    <input type="text" name="txt_licencia" id="txt_licencia"  />

                    <span class="textfieldRequiredMsg"><br />

                    Debe completar este campo.</span></span></td>

                  <td align="left" bgcolor="#E2E2E2">&nbsp;</td>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">Fecha Nacimiento</td>

                  <td align="left" bgcolor="#E2E2E2"><label for="cb_tramite"></label>

                    <label for="datepicker"></label>

                    <input type="date" name="datepicker" id="datepicker" value=""/></td>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">E-Mail</td>

                  <td align="left" bgcolor="#E2E2E2"><label for="txt_mail"></label>
                    <span id="sprytextfield5">
                    <input type="text" name="txt_mail" id="txt_mail" />
                    <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>

                  <td align="left" bgcolor="#E2E2E2">&nbsp;</td>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">Fecha Examen Medico</td>

                  <td align="left" bgcolor="#E2E2E2"><label for="select3"></label>

                    <label for="datepicker2"></label>

                    <input type="date" name="datepicker2" id="datepicker2" value=""/></td>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">&nbsp;</td>

                  <td align="left" bgcolor="#E2E2E2">&nbsp;</td>

                  <td align="left" bgcolor="#E2E2E2">&nbsp;</td>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">Tipo de Doc</td>

                  <td align="left" bgcolor="#E2E2E2"><div spry:region="tipo_documento">

                    <select name="id_tipodoc" id="id_tipodoc" spry:repeatchildren="tipo_documento">



                      <option value="{Nombre}">{Nombre}</option>

                    </select>

                  </div>                    <label for="select4"></label></td>

                  <td colspan="2" rowspan="2" align="left" bgcolor="#E2E2E2"><table width="120" border="0" cellspacing="3" cellpadding="0">

                    <tr>

                      <th scope="col"><input type="submit" name="button" id="button" value="Grabar" /></th>

                      <th scope="col"><input type="reset" name="button2" id="button2" value="Cancelar" /></th>

                    </tr>

                  </table></td>

                  <td align="left" bgcolor="#E2E2E2">&nbsp;</td>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">N° de Documento</td>

                  <td align="left" bgcolor="#E2E2E2"><label for="txt_dni"></label>

                    <span id="sprytextfield2">
                    <input name="txt_dni" type="text" id="txt_dni" size="8" maxlength="8" />
                    <span class="textfieldRequiredMsg"><br />
Completar este campo.</span><span class="textfieldInvalidFormatMsg"><br />
Debe ingresar solo numeros.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>

                  <td align="left" bgcolor="#E2E2E2">&nbsp;</td>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000"><span class="parrafo_negro_pequeno" style="color: #000">Dirección</span></td>

                  <td colspan="4" align="left" bgcolor="#E2E2E2"><span id="sprytextfield3">

                    <input name="txt_direccion" type="text" id="txt_direccion" size="90" />

                    <span class="textfieldRequiredMsg">Debe completar este campo.</span></span></td>

                </tr>

                <tr>

                  <td align="left" bgcolor="#E2E2E2" class="parrafo_negro_pequeno" style="color: #000">Certificado</td>

                  <td colspan="4" align="left" bgcolor="#E2E2E2" class="parrafo_negro"><label for="fileField"></label>

                    <input type="file" name="fileField" id="fileField" />                    <label for="txt_direccion"></label></td>

                </tr>

              </table></th>

            </tr>

          </table></td>

        </tr>

        <tr>

          <td bgcolor="#E2E2E2"><label for="st_anulado"></label>

            <input type="hidden" name="st_anulado" id="st_anulado" value="no"/>

            <?php if(isset($_GET['mensaje_confirmacion'])){echo "<table width='100%' border='0' bgcolor='#990000'><tr><td>".$_GET['mensaje_confirmacion']."</td></tr></table>";}?></td>

        </tr>

      </table>

      <input type="hidden" name="MM_insert" value="form1" />

    </form></th>

  </tr>

</table>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");

var spryselect1 = new Spry.Widget.ValidationSelect("val_tramite", {invalidValue:"0"});

var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {minChars:8, maxChars:8});

var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");

var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {hint:"Correo Electronico"});
</script>

</body>

</html>

<?php

mysql_free_result($max_codigo_postulante);



mysql_free_result($tramites);

?>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
</script>