<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Agregar Usuarios</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to right, #f8ffae, #43c6ac);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .form-container {
      background-color: white;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 600px;
    }

    h2 {
      text-align: center;
      color: #007bff;
      margin-bottom: 20px;
    }

    form table {
      width: 100%;
    }

    th {
      text-align: right;
      padding-right: 10px;
      font-weight: bold;
      color: #333;
      vertical-align: top;
    }

    td {
      padding: 10px 0;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
      transition: border-color 0.3s ease;
    }

    input:focus {
      border-color: #007bff;
      outline: none;
    }

    .form-buttons {
      text-align: right;
      margin-top: 20px;
    }

    input[type="reset"],
    input[type="submit"] {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      margin-left: 10px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="reset"] {
      background-color: #f44336;
      color: white;
    }

    input[type="reset"]:hover {
      background-color: #d32f2f;
      transform: scale(1.05);
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    .mensaje {
      color: red;
      text-align: center;
      margin-top: 15px;
    }

    .btn-regresar {
      display: block;
      margin: 20px auto 0;
      text-align: center;
      padding: 6px 16px;
      background-color: #555;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      font-size: 14px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-regresar:hover {
      background-color: #333;
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Agregar Usuarios</h2>
    <hr><br>

    <form action="../../../Controladores/ctrlPersonas.php" method="post">
      <table>
        <tr>
          <th><label for="huella">Ingrese Huella:</label></th>
          <td><input type="text" name="huella" id="huella" required placeholder="Ingrese la huella"></td>
        </tr>
        <tr>
          <th><label for="cc">Documento:</label></th>
          <td><input type="number" name="cc" id="cc" required placeholder="Ingrese su documento"></td>
        </tr>
        <tr>
          <th><label for="nombre">Nombres:</label></th>
          <td><input type="text" name="nombre" id="nombre" required placeholder="Ingrese su nombre"></td>
        </tr>
        <tr>
          <th><label for="apellido">Apellidos:</label></th>
          <td><input type="text" name="apellido" id="apellido" required placeholder="Ingrese su apellido"></td>
        </tr>
        <tr>
          <th><label for="email">Email:</label></th>
          <td><input type="email" name="email" id="email" required placeholder="Ingrese su correo electrónico"></td>
        </tr>
      </table>

      <div class="form-buttons">
        <input type="reset" value="Limpiar">
        <input type="submit" value="Guardar" name="accion">
      </div>
    </form>

    <div class="mensaje"><?php echo @$_REQUEST['msj']; ?></div>

    <a href="indexPersonas.html" class="btn-regresar">← REGRESAR</a>
  </div>

</body>
</html>
