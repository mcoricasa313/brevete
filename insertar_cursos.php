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

//if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO curso (id_local, nom_curso, hora_inicio, hora_fin, profesor) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['local2'], "int"),
                       GetSQLValueString($_POST['nombre_curso_add'], "text"),
                       GetSQLValueString($_POST['hora_inicio'], "date"),
                       GetSQLValueString($_POST['hora_fin'], "date"),
                       GetSQLValueString($_POST['profesor'], "text"));

  mysql_select_db($database_brevete, $brevete);
  $Result1 = mysql_query($insertSQL, $brevete) or die(mysql_error());
	$document_cap = $_POST['documento_postulante2'];
  $insertGoTo = "registro_capacitaciones.php?doc=$document_cap";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
//}
?>
