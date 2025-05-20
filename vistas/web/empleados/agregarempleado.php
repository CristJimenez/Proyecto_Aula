<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuarios</title>

    <style type="text/css">

        th{
            text-align: right;
        }

</style>
</head>
<body>

    <center>
        <H2>Agregar Empleados</H2>

        <HR />
        <form action="../../../controladores/ControladorEmpleados.php" method="post">
            <fieldset>
                <table>
                    <tr>
                        <th>Huella:</th>
                        <td>
                            <input type="text" name="huella" id="huella" required placeholder="Ingrese la huella">
                        </td>
                    </tr>
                    <tr>
                        <th>Cargo:</th>
                        <td>
                            <input type="text" name="cargo" id="cargo" required placeholder="Ingrese su cargo">
                        </td>
                    </tr>
                    <tr>
                        <th>Horario:</th>
                        <td>
                            <input type="text" name="horario" id="horario" required placeholder="Ingrese su horario">
                        </td>
                    </tr>
                    <tr>
                        <th>Departamento:</th>
                        <td>
                            <input type="text" name="departamento" id="departamento" required placeholder="Ingrese su departamento">
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="right">
                            <input type="reset" value="Limpiar">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="Guardar" name="accion">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    
      <hr>
      <span style="color: red;"><?@$_REQUEST['msj']?></span>

     </center>


</body>
</html>