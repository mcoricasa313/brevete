<?php ob_start();?>
<?php require_once('Connections/brevete.php'); ?>
<?php require_once('class.ezpdf.php')?>

<?php
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
//date_default_timezone_set("America/Lima");
?>
<?php 
$queEmp = "SELECT * FROM auditoria;";
$resEmp = mysql_query($queEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) {
    $ixx = $ixx+1;
    $data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
                'id_auditoria'=>'<b>Num</b>',
                'id_usuario'=>'<b>Empresa</b>',
                'fe_ingreso'=>'<b>Direccion</b>',
                'mt_horaingreso'=>'<b>Telefono</b>',
                'fe_salida'=>'<b>Telefono</b>',
				'mt_horasalida'=>'<b>Telefono</b>',
				'st_ingreso'=>'<b>Telefono</b>'
				
            );
$options = array(
                'shadeCol'=>array(0.9,0.9,0.9),
                'xOrientation'=>'center',
                'width'=>500
            );
			
			
			
			$txttit = "<b>ESCUELA DE CONDUCTORES INTEGRALES LOS PROFESIONALES</b>\n";
			$txttit.= "Reporte de Usuarios Logueados";
 
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>
<?php //ob_end_flush();?>
