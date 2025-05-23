<?php date_default_timezone_set('America/Bogota'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de acceso</title>

</head>

<body>
    <header>
        <center>
            <h2>Control de acceso biblioteca UNICOLOMBO</h2>
        </center>
        <a href=""></a>
    </header>
    <br><br>


    <center>
        <table border="3">
            <tr>
            <tr>
                <td class="title_tabla" colspan="2" style="text-align: center;">Bienvenido a la biblioteca</td>
            </tr>
            <th> Ingrese su huella:</th>
            <td>
                <form action="../../../Controladores/ctrlRegistro.php" method="post">
                    <input type="text" name="huella" placeholder="Ingrese su huella">
            <input type="hidden" name="horaEntra" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="horaSale" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="codBiblioteca" value="unicolombo">
            <input type="submit" name="accion" value="Ingresar">
            </td>
            </form>
            </tr>
        </table>
    </center>
    <br> <br>


    <center>
        <div class="bienvenida">
            <center>
                <h1><span style="color: red;"><?= @$_REQUEST['msj'] ?></span></h1>
            </center>
        </div>
    </center>


</body>

</html>