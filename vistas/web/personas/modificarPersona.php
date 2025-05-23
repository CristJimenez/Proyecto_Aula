<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Modificar Estudiante</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to right, #74ebd5, #ACB6E5);
      padding: 40px 20px;
      min-height: 100vh;
      color: #333;
    }

    .container {
      max-width: 900px;
      margin: auto;
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #2c3e50;
    }

    form {
      text-align: center;
      margin-bottom: 30px;
    }

    label {
      font-weight: bold;
      margin-right: 10px;
      font-size: 16px;
    }

    input[type="text"], input[type="email"] {
      padding: 10px;
      width: 220px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin: 5px 0;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .btn-regresar {
      display: inline-block;
      margin-top: 25px;
      padding: 6px 14px;
      font-size: 13px;
      background-color: #555;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-regresar:hover {
      background-color: #333;
      transform: scale(1.05);
    }

    @media (max-width: 600px) {
      input[type="text"], input[type="email"] {
        width: 100%;
      }

      .container {
        padding: 20px;
      }

      th, td {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Consultar Estudiante</h1>

    <!-- Formulario de consulta -->
    <form action="../../../controladores/ctrlPersonas.php" method="POST">
      <label for="ID">Número de documento:</label>
      <input type="text" name="documento" placeholder="Ingrese el documento" required>
      <input type="hidden" name="redireccion" value="si">
      <input type="submit" value="Consultar" name="accion">
    </form>

    <!-- Tabla para modificar -->
    <?php
      $datos = $_SESSION['datos'] ?? [];
      if (!empty($datos)):
    ?>
    <form action="../../../controladores/ctrlPersonas.php" method="POST">
      <table>
        <tr>
          <th>Documento</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Email</th>
          <th>Acción</th>
        </tr>
        <tr>
          <input type="hidden" name="huella" value="<?= htmlspecialchars($datos['huella'] ?? '') ?>">
          <td><input type="text" name="documento" value="<?= htmlspecialchars($datos['documento'] ?? '') ?>"></td>
          <td><input type="text" name="nombre" value="<?= htmlspecialchars($datos['nombres'] ?? '') ?>"></td>
          <td><input type="text" name="apellido" value="<?= htmlspecialchars($datos['apellidos'] ?? '') ?>"></td>
          <td><input type="email" name="email" value="<?= htmlspecialchars($datos['email'] ?? '') ?>"></td>
          <td><input type="submit" value="Modificar" name="accion"></td>
        </tr>
      </table>
    </form>
    <?php endif; ?>

    <div style="text-align: center;">
      <a href="indexPersonas.html" class="btn-regresar">← REGRESAR</a>
    </div>
  </div>
</body>
</html>

