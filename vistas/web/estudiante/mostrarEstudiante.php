<?php
require_once "../../../modelo/entidades/estudiante.php";
session_start();
$estudiantes = $_SESSION['estudiantes'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LISTAR ESTUDIANTES</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to right, #74ebd5, #9face6);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      background-color: white;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 1000px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    .title_tabla {
      background-color: #4b6cb7;
      color: white;
      font-weight: bold;
      padding: 12px;
      text-align: left;
    }

    td {
      border: 1px solid #ddd;
      padding: 10px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    button {
      background-color: #4b6cb7;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 24px;
      margin-top: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
      background-color: #3a539b;
      transform: scale(1.03);
    }

    .boton-regresar {
      display: inline-block;
      margin-bottom: 20px;
      background-color: #4b6cb7;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 24px;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .boton-regresar:hover {
      background-color: #3a539b;
      transform: scale(1.03);
    }

    p {
      text-align: center;
      font-size: 1rem;
      color: #444;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="indexEstudiante.html" class="boton-regresar">REGRESAR</a>
    <h2>Listado de Estudiantes</h2>

    <?php if (!empty($estudiantes)) { ?>
      <table>
        <tr>
          <td class="title_tabla">Estado</td>
          <td class="title_tabla">Semestre</td>
          <td class="title_tabla">Carrera</td>
          <td class="title_tabla">Huella</td>
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

    <form method="post" action="../../../Controladores/ControladorEstudiante.php" style="text-align: center;">
      <input type="hidden" name="accion" value="CONSULTAR_TODO">
      <button type="submit">Consultar Estudiantes</button>
    </form>
  </div>
</body>
</html>
