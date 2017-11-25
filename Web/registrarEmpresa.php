<?php

$dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');

?>

<html>
  <head>
    <title>GoWork</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>
    <h1>GoWork - Registrar Empresa</h1>
    <form method="POST" action="">
      <h2>Informaci&oacute;n de la empresa</h2>
      <table>
        <td><label>Nombre de la Empresa</label></td><td><input type="text" name="companyname" /></td></tr>
        <td><label>CUIT</label></td><td><input type="text" name="cuit" /></td></tr>
        <td><label>Sector</label></td>
        <td>
          <select>
            <?php
            $result = pg_query($dbcon, "select * from sector order by name;");
            while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
              echo '<option value="'.$row['id'].'"> '.$row['name'].' </option>';
            }
            ?>
          </select>
        </td></tr>
        <td><label>Ubicaci&oacute;n</label></td>
        <td><input placeholder="Direcci&oacute;n" name="address" /></td></tr>
        <td></td><td><input placeholder="Localidad" name="city" /></td></tr>
        <td></td><td><input placeholder="Provincia" name="state"/></td></tr>
        <td></td><td><input placeholder="Pa&iacute;s" name="country" /></td></tr>
        <td></td><td><input placeholder="CP" name="cp" /></td></tr>
        <td><label>Tel&eacute;fono</label></td>
        <td><input placeholder="+54 11 5123 456" name="phone" /></td>
      </table>
      <h2>Informaci&oacute;n de la cuenta</h2>
      <table>
        <td><label>Nombre de usuario</label></td><td><input type="text" name="username" /></td></tr>
        <td><label>Contraseña</label></td><td><input type="password" name="pass" /></td></tr>
        <td><label>Repita contraseña</label></td><td><input type="password" name="pass2" /></td></tr>
        <td><label>E-mail</label></td><td><input type="text" name="email" /></td>
      </table>
      <div class="acepto-terminos">
        <input type="checkbox" name="terms" value="accept" /><label>Acepto <a href="">T&eacute;rminos y condiciones</a></label>
      </div>
      <input type="submit" value="Registrar" name="register" />
    </form>
  </body>
</html>
