<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR DATOS DEL EMPLEADO</title>
    <style type="text/css">
        th {
            text-align: right;
        }
    </style>
</head>
<body>
<center>
    <form action="../../../Controladores/ControladorEmpleados.php" method="post">
        <fieldset style="width: 40%;">

            <table>
                <tr>
                    <th>HUELLA_PERSONA</th>
                    <td>
                         <input type="number" name="huella" id="huella" 
                         required placeholder="HUELLA ACTUAL">
                    </td>
                </tr>
                <tr>
                    <th>CARGO</th>
                    <td>
                        <input type="text" name="cargo" id="cargo"
                        required placeholder="CARGO">
                    </td>
                </tr>
                <tr>
                    <th>HORARIO</th>
                    <td>
                        <input type="text" name="horario" id="horario"
                        required placeholder="HORARIO">
                    </td>
                </tr>
                <tr>
                    <th>DEPARTAMENTO</th>
                    <td>
                        <input type="text" name="departamento" id="departamento"
                        required placeholder="DEPARTAMENTO">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="reset" value="LIMPIAR">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="MODIFICAR" name="accion">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <hr>
    <span style="color: red;"><?= @$_REQUEST['msj'] ?></span>
</center>
</body>
</html>
