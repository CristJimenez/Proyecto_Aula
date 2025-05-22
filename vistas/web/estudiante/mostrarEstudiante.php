<?php
require_once "../../../modelo/entidades/estudiante.php";
session_start();
$estudiantes = $_SESSION['estudiantes'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR ESTUDIANTES</title>
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
        <h2>Listado de Estudiantes</h2>

        <?php if (!empty($estudiantes)) { ?>
            <table>
                <tr>
                    <td class="title_tabla">estadoActivo</td>
                    <td class="title_tabla">semestre</td>
                    <td class="title_tabla">CARRERA</td>
                    <td class="title_tabla">huella_persona</td>
                </tr>

                <?php foreach ($estudiantes as $row) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row->getEstadoActivo()) ?></td>
                        <td><?= htmlspecialchars($row->getSemestre()) ?></td>
                        <td><?= htmlspecialchars($row->getCARRERA()) ?></td>
                        <td><?= htmlspecialchars($row->getHuella_persona()) ?></td>
                    </tr>
                <?php } ?>

            </table>
        <?php } else { ?>
            <p>No hay estudiantes para mostrar.</p>
        <?php } ?>

        <br>
        <form method="post" action="../../../Controladores/ControladorEstudiante.php">
            <input type="hidden" name="accion" value="CONSULTAR_TODO">
            <BUtton type="submit">CONSULTAR ESTUDIANTES</BUtton>
            </form>
    </center>

</body>
</html>
