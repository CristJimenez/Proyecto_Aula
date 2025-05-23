<?php
require_once "../../../modelo/entidades/empleados.php";
session_start();
$empleados = $_SESSION['empleados'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Listar Empleados</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #6dd5ed, #2193b0);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      width: 90%;
      max-width: 900px;
      text-align: center;
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .title_tabla {
      background-color: #f06292;
      color: white;
      padding: 12px;
      font-weight: bold;
    }

    td {
      padding: 10px;
      border: 1px solid #ccc;
      background-color: #f9f9f9;
    }

    .btn {
      padding: 10px 20px;
      margin: 10px 5px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
      background-color: #0056b3;
      transform: scale(1.03);
    }

    .btn-return {
      display: inline-block;
      text-decoration: none;
      background-color: #007bff;
      padding: 10px 20px;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      margin-top: 20px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-return:hover {
      background-color: #0056b3;
      transform: scale(1.03);
    }

    .message {
      margin-top: 20px;
      color: red;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>📋 LISTADO DEL EMPLEADOS</h2>

    <a href="indexEmpleado.html" class="btn-return">← Regresar</a>

    <?php if (!empty($empleados)) { ?>
      <table>
        <tr>
          <td class="title_tabla">Horario</td>
          <td class="title_tabla">Cargo</td>
          <td class="title_tabla">Departamento</td>
          <td class="title_tabla">Huella Persona</td>
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
      <p class="message">No hay empleados para mostrar.</p>
    <?php } ?>

    <form method="post" action="../../../Controladores/ControladorEmpleados.php">
      <input type="hidden" name="accion" value="CONSULTAR_TODO">
      <button type="submit" class="btn">Consultar Empleado</button>
    </form>
  </div>

</body>
</html>
