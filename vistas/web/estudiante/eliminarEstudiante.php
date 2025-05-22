<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELIMINAR ESTUDIANTE</title>
</head>
<body>
    <center>
        <h2>ELIMINAR ESTUDIANTE</h2>
        <hr>

        <form method="post" action="../../../Controladores/ControladorEstudiante.php" >
        <fieldset style="width: 40%;">
            <tr>
                <th>HUELLA_ESTUDIANTE</th>
                <td>
                    <input type="number" name="huella" id="huella"
                    placeholder="COLOCA LA HUELLA">

                    <input type="submit" value="ELIMINAR" name="accion">
                </td>
            </tr>
        </fieldset>
        </form>
        <hr>

        <span style="color: red;"><?= @$_REQUEST[ 'msj']?></span>
    </center>
    
</body>
</html>