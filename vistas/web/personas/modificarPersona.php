<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>

<body>

    <center>
        <div class="container">
            <h1>Consultar estudiante</h1>
            <form action="../../../controladores/ctrlPersonas.php" method="POST">

                <label for="ID" class="nD">Numero de documento:</label>
                <input type="text" name="documento" placeholder="Ingrese el documento" required>
                <input type="hidden" name="redireccion" value="si">
                <input type="submit" value="Consultar" name="accion" placeholder="consultar">

            </form>

        </div>
    </center>

    <center>
        <div class="container">
            <table border="3">

                <tr>

                    <td class="title_tabla" colspan="">Documento</td>
                    <td class="title_tabla" colspan="">Nombre</td>
                    <td class="title_tabla" colspan="">Apellidos</td>
                    <td class="title_tabla" colspan="">Email</td>
                </tr>

                <?php
                session_start();
                $datos = $_SESSION['datos'] ?? [];
                ?>

                <tr>
                    <form action="../../../controladores/ctrlPersonas.php" method="POST">
                        <input type="hidden" name="huella" value="<?php echo  htmlspecialchars($datos['huella'] ?? ''); ?>">
                        <td><input type="text" name="documento" value="<?php echo  htmlspecialchars($datos['documento'] ?? ''); ?>"></td>
                        <td><input type="text" name="nombre" value="<?php echo  htmlspecialchars($datos['nombres'] ?? ''); ?>"></td>
                        <td><input type="text" name="apellido" value="<?php echo  htmlspecialchars($datos['apellidos'] ?? ''); ?>"></td>
                        <td><input type="email" name="email" value="<?php echo  htmlspecialchars($datos['email'] ?? ''); ?>"></td>
                        <td><input type="submit" value="Modificar" name="accion" required></td>
                        
                    </form>
                </tr>


            </table>
    </center>


    </div>
</body>

</html>