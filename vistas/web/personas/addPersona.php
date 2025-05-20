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
        <H2>Agregar Usuarios</H2>

        <HR />
        <form action="../../../Controladores/ctrlPersonas.php" method="post">
            <fieldset>
                <table>
                    <tr>
                        <th>Cedula:</th>
                        <td>
                            <input type="text" name="huella" id="huella" required placeholder="Ingrese la huella">
                        </td>
                    </tr>
                    <tr>
                        <th>Documento:</th>
                        <td>
                            <input type="number" name="cc" id="cc" required placeholder="Ingrese su documento">
                        </td>
                    </tr>
                    <tr>
                        <th>Nombres:</th>
                        <td>
                            <input type="text" name="nombre" id="nombre" required placeholder="Ingrese su nombre">
                        </td>
                    </tr>
                    <tr>
                        <th>Apellidos:</th>
                        <td>
                            <input type="text" name="apellido" id="apellido" required placeholder="Ingrese su apellido">
                        </td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>
                            <input type="email" name="email" id="email" required placeholder="Ingrese su apellido">
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