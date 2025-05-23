<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ELIMINAR EMPLEADO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div>
        <center>
            <h2>ELIMINAR EMPLEADO</h2>
            <hr>
            <form method="post" action="../../../controladores/ControladorEmpleados.php">
                <div class="receptor">
                    <label for="huella_persona">HUELLA EMPLEADO:</label>
                    <input type="text" name="huella_persona" required placeholder="INGRESE LA HUELLA DEL EMPLEADO">
                    <input type="submit" value="CONSULTAR" name="accion">
                </div>
            </form>
            <br><br>


            <table class="table">
                <thead>

                    <tr>

                        <th scope="col">Horario</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Departamento</th>

                    </tr>

                </thead>

                <?php session_start();
                $datos = $_SESSION['datos'] ?? []; ?>
    
                <tbody>
                    <tr>
                        <th><?= htmlspecialchars($datos['horario'] ?? '') ?></th>
                        <td><?= htmlspecialchars($datos['cargo'] ?? '') ?></td>
                        <td><?= htmlspecialchars($datos['Departamento'] ?? '') ?></td>
                    

                    <td>
                        <form action="../../../controladores/ControladorEmpleados.php" method="post"
                            onsubmit="return confirm('¿Seguro desea eliminar este registro?');">
                            <input type="hidden" name="huella_persona"
                                value="<?= htmlspecialchars($datos['huella_persona'] ?? ''); ?>">
                            <input type="hidden"  name="accion" value="ELIMINAR">
                            <input type="submit" value="ELIMINAR">
                        </form>
                    </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <span style="color: red;"><?= @$_REQUEST['msjeli'] ?></span>
        </center>
    </div>
</body>

</html>