<?php ob_start();?>
<?php 
  include_once("Connections/brevete.php");
    
  $query2 = "select MAX(id_auditoria) from auditoria;";
  $result = mysql_query($query2);
  $row = mysql_fetch_row($result);
  echo $row["0"];
  $query = "UPDATE auditoria set fe_salida = current_date(), mt_horasalida = current_time() where  id_auditoria=".$row['0'];
  mysql_query($query);
  session_start(); 
    session_destroy(); 
    header('location: login.php'); 
?>
<?php ob_end_flush();?>
