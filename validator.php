<?php ob_start();?>
<?php require_once('Connections/brevete.php'); ?>
<?php session_start(); ?>
<?php 
$usuario = $_POST["txt_usuario"];
$clave = $_POST["txt_clave"];
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
$query_validation = "SELECT * FROM usuarios  WHERE usuarios.ds_usuario='".$usuario."' AND usuarios.ds_clave='".$clave."';";
$validation = mysql_query($query_validation, $brevete) or die(mysql_error());
$row_validation = mysql_fetch_assoc($validation);
$totalRows_validation = mysql_num_rows($validation);
?>

<?php 
echo $totalRows_validation;
if($totalRows_validation>0){
$id_usuario = $row_validation['id_usuario'];
$fe_ingreso = "TIMESTAMP()";
$mt_horaingreso = "";
$fe_salida= "";
$mt_horasalida = "";
$st_ingreso = $row_validation['ds_usuario'];
$_SESSION['tipo_user']= $row_validation['st_nivel'];

$query = "INSERT INTO auditoria(id_usuario,fe_ingreso,mt_horaingreso,fe_salida,mt_horasalida,st_ingreso) values(".$id_usuario.", current_date(), current_time(), '', '', '".$st_ingreso."');
";

mysql_query($query);

header("Location: menu_principal.php");

}else{
	$mensaje = "Usuario o password incorrectos";
header("Location: login.php?mensaje='Usuario o password incorrectos'");


}

?>

<?php
mysql_free_result($validation);
?>
<?php ob_end_flush();?>
