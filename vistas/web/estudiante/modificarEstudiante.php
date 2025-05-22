<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MODIFICAR ESTUDIANTE</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to right, #74ebd5, #9face6);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-card {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    h2 {
      text-align: center;
      margin-bottom: 24px;
      color: #333;
    }

    form table {
      width: 100%;
    }

    th {
      text-align: left;
      padding: 10px 0;
      color: #555;
    }

    td {
      padding: 10px 0;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
      background-color: #f0f0f0;
      outline: none;
    }

    .buttons {
      text-align: right;
      margin-top: 20px;
    }

    input[type="submit"],
    input[type="reset"] {
      background-color: #4b6cb7;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 24px;
      margin-left: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #3a539b;
      transform: scale(1.03);
    }

    .boton-regresar {
      display: inline-block;
      margin-top: 20px;
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

    #mensaje-error {
      color: red;
      margin-top: 16px;
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h2>MODIFICAR ESTUDIANTE</h2>
    <form action="../../../Controladores/ControladorEstudiante.php" method="POST">
      <table>
        <tr>
          <th>Huella Persona</th>
          <td><input type="number" name="huella" id="huella" required placeholder="Huella actual" /></td>
        </tr>
        <tr>
          <th>Estado</th>
          <td><input type="number" name="estado" id="estado" required placeholder="Estado" /></td>
        </tr>
        <tr>
          <th>Carrera</th>
          <td><input type="text" name="carrera" id="carrera" required placeholder="Carrera" /></td>
        </tr>
        <tr>
          <th>Semestre</th>
          <td><input type="text" name="semestre" id="semestre" required placeholder="Semestre" /></td>
        </tr>
      </table>

      <div class="buttons">
        <input type="reset" value="Limpiar" />
        <input type="submit" value="Modificar" name="accion" />
      </div>
    </form>
    <div id="mensaje-error"><?= @$_REQUEST['msj'] ?></div>
    <a href="indexEstudiante.html" class="boton-regresar">REGRESAR</a>
  </div>
</body>
</html>
