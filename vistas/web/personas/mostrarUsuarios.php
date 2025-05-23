<?php require_once "../../../controladores/ctrlPersonas.php"; session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Listado de Personas</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to right, #ffecd2, #fcb69f);
      padding: 40px 20px;
      min-height: 100vh;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .tabla-container {
      overflow-x: auto;
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      max-width: 900px;
      margin: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: center;
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #007bff;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
      transition: background-color 0.3s ease;
    }

    .btn-regresar {
      display: inline-block;
      margin: 30px auto 0;
      padding: 6px 16px;
      font-size: 14px;
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

    .center-btn {
      text-align: center;
    }

    @media (max-width: 600px) {
      th, td {
        font-size: 14px;
        padding: 10px;
      }

      .tabla-container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <h2> 📋Listado de Personas Registradas</h2>

  <div class="tabla-container">
    <table>
      <tr>
        <th>Documento</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
      </tr>

      <?php 
        $usuarios = $_SESSION['usuarios'] ?? [];
        foreach ($usuarios as $row): 
      ?>
        <tr>
          <td><?= htmlspecialchars($row->getDocumento()) ?></td>
          <td><?= htmlspecialchars($row->getNombres()) ?></td>
          <td><?= htmlspecialchars($row->getApellidos()) ?></td>
          <td><?= htmlspecialchars($row->getEmail()) ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <div class="center-btn">
    <a href="indexPersonas.html" class="btn-regresar">← REGRESAR</a>
  </div>

</body>
</html>
