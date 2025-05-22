<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR DATOS DEL ESTUDIANTE</title>
    <style type="text/css">
        th {
            text-align: right;
        }
    </style>
</head>
<body>
<center>
    <form action="../../../Controladores/ControladorEstudiante.php" method="post">
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
                    <th>ESTADO</th>
                    <td>
                        <input type="number" name="estado" id="estado"
                        required placeholder="ESTADO">
                    </td>
                </tr>
                <tr>
                    <th>CARRERA</th>
                    <td>
                        <input type="text" name="carrera" id="carrera"
                        required placeholder="CARRERA">
                    </td>
                </tr>
                <tr>
                    <th>SEMESTRE</th>
                    <td>
                        <input type="text" name="semestre" id="semestre"
                        required placeholder="SEMESTRE">
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
