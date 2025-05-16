<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR ESTUDIANTE</title>

    <style type="text/css">
        th {
            text-align: right;
        }

    </style>
</head>
<body>
    <center>
        <h2>INSERTAR ESTUDIANTE</h2>
        <hr />

        <form action="post" action="../../../controladores/ControladorEstudiante.php">
            <fieldset style="width: 40%;">
                <table>
                    <tr>
                        <th>HUELLA_ESTUDIANTE</th>
                        <td>
                            <input type="number" name="huella" id="huella"
                            required placeholder="PRESIONA EL DEDO">
                        </td>
                    </tr>
                    <tr>
                        <th>ESTADO</th>
                        <td>
                            <input type="text" name="estado" id="estado"
                            required placeholder="INGRESA EL ESTADO">
                        </td>
                    </tr>
                    <tr>
                        <th>CARRERA</th>
                        <td>
                            <input type="text" name="carrera" id="carrera"
                            required placeholder="INGRESA LA CARRERA">
                        </td>
                    </tr>
                    <tr>
                        <th>SEMESTRE</th>
                        <td>
                            <input type="text" name="semestre" id="semestre"
                            required placeholder="INGRESA EL SEMESTRE">
                        </td>
                    </tr>
                    <tr>

                    <td colspan="2" align="right">
                        <input type="reset" value="LIMPIAR">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="INSERTAR" name="accion">
                    </td>
                    </tr>
                </table>

            </fieldset>
    </form>
    <hr>

    <span style="color: red;"><?= @$_REQUEST[ 'msj']?></span>
    </center>
    
</body>
</html>