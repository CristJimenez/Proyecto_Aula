<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminar Empleado</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      max-width: 800px;
      text-align: center;
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    form input[type="text"] {
      width: 60%;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .mensaje {
      color: red;
      margin-top: 15px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>ELIMINAR EMPLEADO</h2>
    <hr>
    
    <form method="post" action="../../../controladores/ControladorEmpleados.php">
      <label for="huella_persona"><strong>Huella del Empleado:</strong></label><br>
      <input type="number" name="huella_persona" required placeholder="Ingrese la huella del empleado"><br>
      <input type="submit" class="btn" value="Consultar" name="accion">
    </form>

    <table>
      <thead>
        <tr>
          <th>Horario</th>
          <th>Cargo</th>
          <th>Departamento</th>
          <th>Acción</th>
        </tr>
      </thead>
      <?php session_start();
      $datos = $_SESSION['datos'] ?? []; ?>
      <tbody>
        <tr>
          <td><?= htmlspecialchars($datos['horario'] ?? '') ?></td>
          <td><?= htmlspecialchars($datos['cargo'] ?? '') ?></td>
          <td><?= htmlspecialchars($datos['Departamento'] ?? '') ?></td>
          <td>
            <form action="../../../controladores/ControladorEmpleados.php" method="post"
                  onsubmit="return confirm('¿Seguro desea eliminar este registro?');">
              <input type="hidden" name="huella_persona" value="<?= htmlspecialchars($datos['huella_persona'] ?? '') ?>">
              <input type="submit" class="btn" value="Eliminar" name="accion">

            </form>
          </td>
        </tr>
      </tbody>
    </table>

    <span class="mensaje"><?= @$_REQUEST['msjeli'] ?></span><br><br>
    <a href="indexEmpleado.html" class="btn-return">← Regresar</a>
  </div>
</body>
</html>
