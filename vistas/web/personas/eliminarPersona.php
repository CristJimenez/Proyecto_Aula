<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>

<header>
    <!-- agegar header-->
</header>

<body>
    <center>
        <div class="container">
            <h1>Consultar estudiante</h1>
            <form action="../../../controladores/ctrlPersonas.php" method="POST">

                <label for="ID" class="nD">Numero de documento:</label>
                <input type="text" name="documento" placeholder="Ingrese el documento" required>
                <input type="submit" value="Consultar" name="accion" placeholder="consultar">
            </form>

        </div>
    </center>
    <br><br>
    <center>
        <table border="3">

            <tr>
                <td class="title_tabla" colspan="">Documento</td>
                <td class="title_tabla" colspan="">Nombre</td>
                <td class="title_tabla" colspan="">Apellido</td>
                <td class="title_tabla" colspan="">Email</td>
                <td class="title_tabla" colspan="">Operaciones</td>
            </tr>

            <?php
            session_start();
            $datos = $_SESSION['datos'] ?? [];
            ?>
            <tr>
                <td><?php echo  htmlspecialchars($datos['documento'] ?? ''); ?></td>
                <td><?php echo  htmlspecialchars($datos['nombres'] ?? ''); ?></td>
                <td><?php echo  htmlspecialchars($datos['apellidos'] ?? ''); ?></td>
                <td><?php echo  htmlspecialchars($datos['email'] ?? ''); ?></td>
                <td>
                    <form action="../../../controladores/ctrlPersonas.php" method="post" onsubmit="return confirm('¿Seguro desea eliminar este registro?');">
                        <input type="hidden" name="documento" value="<?php echo htmlspecialchars($datos['documento'] ?? ''); ?>">
                        <button type="submit" value="Eliminar" name="accion">Eliminar</button>
                    </form>
                </td>

            </tr>



        </table>
    </center>


</body>

</html>