<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AGREGAR BIBLIOTECA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <style>
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
    }

    h2 {
      text-align: center;
      margin-bottom: 24px;
      color: #333;
    }

    label {
      font-weight: 600;
      color: #555;
      margin-top: 15px;
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

    .mensaje-error {
      color: red;
      margin-top: 16px;
      text-align: center;
    }

    .boton-regresar {
      display: inline-block;
      margin-top: 30px;
      background-color: #4b6cb7;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 24px;
      text-decoration: none;
      text-align: center;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .boton-regresar:hover {
      background-color: #3a539b;
      transform: scale(1.03);
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h2>AGREGAR BIBLIOTECA</h2>
    <form method="post" action="../../../Controladores/ControladorBiblioteca.php">
      <div class="form-group">
        <label for="id">BIBLIOTECA ID:</label>
        <input type="text" name="id" id="id" required placeholder="INGRESE EL ID">
      </div>
      <div class="form-group">
        <label for="aforo">AFORO:</label>
        <input type="number" name="aforo" id="aforo" required placeholder="INGRESE EL AFORO">
      </div>
      <div class="form-group">
        <label for="area">ÁREA:</label>
        <input type="text" name="area" id="area" required placeholder="INGRESE EL ÁREA">
      </div>
      <div class="buttons">
        <input type="reset" value="LIMPIAR">
        <input type="submit" value="GUARDAR" name="accion">
      </div>
    </form>
    <div class="mensaje-error"><?= @$_REQUEST['msj'] ?></div>
    <center>
      <a href="indexbiblioteca.html" class="boton-regresar">REGRESAR</a>
    </center>
  </div>
</body>
</html>
