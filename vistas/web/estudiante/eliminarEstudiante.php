<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ELIMINAR ESTUDIANTE</title>
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
      margin-bottom: 24px;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
      text-align: left;
    }

    input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="number"]:focus {
      background-color: #f0f0f0;
      outline: none;
    }

    input[type="submit"] {
      background-color: #4b6cb7;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 24px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      width: 100%;
      margin-bottom: 20px;
    }

    input[type="submit"]:hover {
      background-color: #3a539b;
      transform: scale(1.03);
    }

    .boton-regresar {
      display: inline-block;
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
    <h2>ELIMINAR ESTUDIANTE</h2>
    <form method="POST" action="../../../Controladores/ControladorEstudiante.php">
      <label for="huella">Huella del Estudiante</label>
      <input type="number" name="huella" id="huella" required placeholder="Coloca la huella" />
      <input type="submit" value="ELIMINAR" name="accion" />
    </form>
    <div id="mensaje-error"><?= @$_REQUEST['msj'] ?></div>
    <a href="indexEstudiante.html" class="boton-regresar">REGRESAR</a>
  </div>
</body>
</html>

