<?php
require_once "../../../modelo/entidades/empleados.php";
session_start();
$empleados = $_SESSION['empleados'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR EMPLEADOS</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        .title_tabla {
            font-weight: bold;
            background-color:rgb(235, 67, 209);
            padding: 8px;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>

    <center>
        <h2>Listado de Empleados</h2>

        <?php if (!empty($empleados)) { ?>
            <table>
                <tr>
                    <td class="title_tabla">HORARIO</td>
                    <td class="title_tabla">CARGO</td>
                    <td class="title_tabla">DEPARTAMENTO</td>
                    <td class="title_tabla">huella_persona</td>
                </tr>

                <?php foreach ($empleados as $row) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row->getHorario()) ?></td>
                        <td><?= htmlspecialchars($row->getCargo()) ?></td>
                        <td><?= htmlspecialchars($row->getDepartamento()) ?></td>
                        <td><?= htmlspecialchars($row->getHuella()) ?></td>
                    </tr>
                <?php } ?>

            </table>
        <?php } else { ?>
            <p>No hay empleados para mostrar.</p>
        <?php } ?>

        <br>
        <form method="post" action="../../../Controladores/ControladorEmpleados.php">
            <input type="hidden" name="accion" value="CONSULTAR_TODO">
            <BUtton type="submit">CONSULTAR EMPLEADO</BUtton>
            </form>
    </center>

</body>
</html>
