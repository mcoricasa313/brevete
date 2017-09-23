<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<title>Ingreso al sistema</title>

<style type="text/css">

body,td,th {

	font-family: Arial, Helvetica, sans-serif;

}

body {

	background-color: #CCC;

}

</style>

<script language="javascript" type="text/javascript">

	function boton1(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"1";

	}

	

	function boton2(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"2";

	}

	function boton3(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"3";

	}

	function boton4(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"4";

	}

	function boton5(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"5";

	}

function boton6(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"6";

	}



function boton7(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"7";

	}



function boton8(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"8";

	}



function boton9(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"9";

	}



function boton0(){

		var captura = document.form1.txt_clave.value;

		document.form1.txt_clave.value= captura +"0";

	}







</script>



</head>



<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <th align="center" scope="col"><form id="form1" name="form1" method="post" action="validator.php">

      <table width="400" border="0" cellspacing="0" cellpadding="0" frame="border">

        <tr>

          <th colspan="2" bgcolor="#666666" style="font-size: 12px" scope="col">Ingreso al Sistema</th>

        </tr>

        <tr>

          <td colspan="2" align="center" bgcolor="#C80203"><img src="images/logo2.jpg" width="239" height="100" /></td>

        </tr>

        <tr>

          <td width="140" align="center" bgcolor="#FFFFFF"><table width="120" border="0" cellspacing="5" cellpadding="0">

            <tr>

              <th align="center" scope="col"><input name="button" type="button" class="btn_numeros" id="button" value="7" onclick="boton7()"/></th>

              <th align="center" scope="col"><input name="button2" type="button" class="btn_numeros" id="button2" value="8" onclick="boton8()"/></th>

              <th align="center" scope="col"><input name="button3" type="button" class="btn_numeros" id="button3" value="9" onclick="boton9()"/></th>

            </tr>

            <tr>

              <td align="center"><input name="button4" type="button" class="btn_numeros" id="button4" value="4" onclick="boton4()"/></td>

              <td align="center"><input name="button5" type="button" class="btn_numeros" id="button5" value="5" onclick="boton5()"/></td>

              <td align="center"><input name="button6" type="button" class="btn_numeros" id="button6" value="6" onclick="boton6()"/></td>

            </tr>

            <tr>

              <td align="center"><input name="button7" type="button" class="btn_numeros" id="button7" value="1" onclick="return boton1();"/></td>

              <td width="40" align="center"><input name="button8" type="button" class="btn_numeros" id="button8" value="2" onclick="boton2()"/>

                <input name="button13" type="button" class="btn_numeros" id="button13" value="1" onclick="return boton1();"/>

                <input name="button15" type="button" class="btn_numeros" id="button15" value="2" onclick="return boton2();"/></td>

              <td width="40" align="center"><input name="button9" type="button" class="btn_numeros" id="button9" value="3" onclick="boton3()"/>

                <input name="button14" type="button" class="btn_numeros" id="button14" value="1" onclick="return boton1();"/>

                <input name="button16" type="button" class="btn_numeros" id="button16" value="3" onclick="return boton3();"/></td>

            </tr>

            <tr>

              <td width="40" align="center"><input name="button10" type="button" class="btn_numeros" id="button10" value="0" onclick="boton0()"/>

                <input name="button17" type="button" class="btn_numeros" id="button17" value="0" onclick="return boton0();"/></td>

              <td colspan="2" align="center"><input name="button11" type="reset" class="btn_numeros" id="button11" value="Limpiar" />

                <input name="button18" type="reset" class="btn_numeros" id="button18" value="Limpiar" onclick=""/></td>

            </tr>

          </table></td>

          <td width="260" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">

            <tr>

              <th colspan="3" class="parrafo_negro" scope="col">

              <?php 

  			  $mensaje =  "";

			  if(isset($_GET["mensaje"])){

			  $mensaje = $_GET["mensaje"]; 

				}else{

			  $mensaje =  "";

              }

			  echo $mensaje;

			  ?>

              <br /></th>

              </tr>

            <tr>

              <td class="parrafo_negro" style="font-size: 10px">Usuariox</td>

              <td><label for="txt_usuario"></label>

                <input type="text" name="txt_usuario" id="txt_usuario" /></td>

              <td rowspan="2"><img src="img/llave.jpg" alt="" width="45" height="52" /></td>

            </tr>

            <tr>

              <td class="parrafo_negro" style="font-size: 10px">Clave</td>

              <td><label for="txt_clave"></label>

                <input type="password" name="txt_clave" id="txt_clave" value="" readonly="readonly" /></td>

            </tr>

            <tr>

              <td height="40">&nbsp;</td>

              <td><input name="button12" type="submit" class="btn_numeros" id="button12" value="Ingresar" />

                <input name="button19" type="submit" class="btn_numeros" id="button19" value="Ingresar" /></td>

              <td>&nbsp;</td>

            </tr>

          </table></td>

        </tr>

      </table>

    </form></th>

  </tr>

</table>

</body>

</html>

