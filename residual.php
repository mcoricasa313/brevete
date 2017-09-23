<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Reportes Generales</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col"><table width="800" border="0" cellspacing="0" cellpadding="0" frame="box">
        <tr>
          <th colspan="4" align="left" bgcolor="#999999" style="color: #FFF" scope="col"> <span style="color: #999">X </span>Menu Principal - [Reportes Generales]</th>
          <th width="143" align="right" bgcolor="#999999" style="color: #FFF" scope="col"><input type="submit" name="button" id="button" value="X" style="color:#FFFFFF;background:#990000;font-weight:bold;border:0 px"/></th>
        </tr>
        <tr>
          <td width="130"><input name="button2" type="submit" class="btn_numeros" id="button2" value="Proceso de Registro" /></td>
          <td width="175"><input name="button3" type="submit" class="btn_numeros" id="button3" value="Mantenimiento de Registros" /></td>
          <td><input name="button4" type="submit" class="btn_numeros" id="button4" value="Consulta" /></td>
          <td width="274" align="left"><input type="submit" name="button5" id="button5" value="Reporte" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="100" colspan="5" align="left" valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr>
              <th scope="col"><fieldset>
                <legend>. </legend>
                <table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <th width="7%" align="left" scope="col"><span class="parrafo_negro">Desde</span></th>
                    <th width="19%" align="left" scope="col"><label for="textfield2"></label>
                      <input type="text" name="textfield" id="textfield2" /></th>
                    <th width="9%" align="left" class="parrafo_negro" scope="col">Tramite</th>
                    <th width="20%" align="left" scope="col"><label for="select"></label>
                      <select name="select" id="select" style="width:150px">
                      </select></th>
                    <th colspan="2" align="left" scope="col"><input type="checkbox" name="checkbox" id="checkbox" />
                      <label for="checkbox" class="parrafo_negro">Todos</label></th>
                    <th width="11%" align="left" scope="col"><input name="button6" type="submit" class="btn_numeros" id="button6" value="Ver Reporte" /></th>
                  </tr>
                  <tr>
                    <td><span class="parrafo_negro">Hasta</span></td>
                    <td><label for="textfield3"></label>
                      <input type="text" name="textfield2" id="textfield3" /></td>
                    <td align="left" class="parrafo_negro">Usuarios</td>
                    <td colspan="3" align="left"><label for="select2"></label>
                      <select name="select2" id="select2" style="width:250px">
                      </select>
                      <input type="checkbox" name="checkbox2" id="checkbox2" />
                      <label for="checkbox2" class="parrafo_negro">Todos</label></td>
                    <td align="left"><input name="button7" type="submit" class="btn_numeros" id="button7" value="Cancelar" /></td>
                  </tr>
                </table>
                <br />
              </fieldset></th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="200" colspan="5" valign="top" bgcolor="#E2E2E2"><div style="overflow:scroll;height:300px">
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
                <th bgcolor="#FFFFFF" class="parrafo_negro_pequeno" scope="col"><a href="reporte2.pdf.php?dato=<?php echo $row_certificados['codigo_certificado'];?>">Imprimir</a></th>
              </tr>
              <?php } while ($row_certificados = mysql_fetch_assoc($certificados)); ?>
            </table>
          </div></td>
        </tr>
        <tr class="parrafo_negro">
          <td align="center" style="font-size: 12px">JHONATAN</td>
          <td align="center" style="font-size: 12px">ONLINE</td>
          <td width="78" style="font-size: 12px">Jhonatan Bazalar</td>
          <td colspan="2" style="font-size: 12px">Fecha 14/11/2015</td>
        </tr>
      </table></th>
    </tr>
  </table>
</form>
</body>
</html>
