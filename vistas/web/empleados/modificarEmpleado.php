<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Modificar Empleado</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #6dd5ed, #2193b0);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      width: 90%;
      max-width: 600px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    form table {
      width: 100%;
    }

    th {
      text-align: right;
      padding-right: 15px;
      vertical-align: top;
      padding-top: 10px;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }

    .btn-small {
      width: 130px;
      padding: 8px 12px;
      margin: 10px 5px;
      font-size: 14px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-small:hover {
      background-color: #0056b3;
      transform: scale(1.03);
    }

    .btn-return {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 16px;
      background-color: #007bff;
      color: white;
      margin-top: 20px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-return:hover {
      background-color: #0056b3;
      transform: scale(1.03);
    }

    .bottom {
      text-align: center;
      margin-top: 20px;
    }

    .bottom span {
      display: block;
      color: red;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>MODIFICAR DATOS DEL EMPLEADO</h2>
    <hr>

    <form action="../../../Controladores/ControladorEmpleados.php" method="post">
      <fieldset>
        <table>
          <tr>
            <th>Huella:</th>
            <td><input type="number" name="huella" id="huella" required placeholder="Huella actual"></td>
          </tr>
          <tr>
            <th>Cargo:</th>
            <td><input type="text" name="cargo" id="cargo" required placeholder="Nuevo cargo"></td>
          </tr>
          <tr>
            <th>Horario:</th>
            <td><input type="text" name="horario" id="horario" required placeholder="Nuevo horario"></td>
          </tr>
          <tr>
            <th>Departamento:</th>
            <td><input type="text" name="departamento" id="departamento" required placeholder="Nuevo departamento"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <input type="submit" class="btn-small" value="Modificar" name="accion">
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <input type="reset" class="btn-small" value="Limpiar">
            </td>
          </tr>
        </table>
      </fieldset>
    </form>

    <div class="bottom">
      <span><?= @$_REQUEST['msj'] ?></span>
      <a href="indexEmpleado.html" class="btn-return">← Regresar</a>
    </div>
  </div>
</body>
</html>
