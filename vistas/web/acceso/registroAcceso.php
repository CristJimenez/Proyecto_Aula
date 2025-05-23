<?php date_default_timezone_set('America/Bogota'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Control de acceso</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to right, #a1c4fd, #c2e9fb);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 30px 20px;
    }

    header h2 {
      color: #004d99;
      margin-bottom: 30px;
      text-align: center;
    }

    .card {
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 500px;
    }

    h3 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    input[type="text"] {
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      border: 1px solid #ccc;
      width: 100%;
    }

    input[type="submit"] {
      padding: 12px;
      background-color: #007bff;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    .mensaje {
      margin-top: 25px;
      color: red;
      font-size: 18px;
      text-align: center;
    }

  </style>
</head>
<body>

  <header>
    <h2>Control de acceso - Biblioteca UNICOLOMBO</h2>
  </header>

  <div class="card">
    <h3>Bienvenido a la Biblioteca</h3>

    <form action="../../../Controladores/ctrlRegistro.php" method="post">
      <input type="text" name="huella" placeholder="Ingrese su huella" required>
      <input type="hidden" name="horaEntra" value="<?php echo date('Y-m-d H:i:s'); ?>">
      <input type="hidden" name="horaSale" value="<?php echo date('Y-m-d H:i:s'); ?>">
      <input type="hidden" name="codBiblioteca" value="unicolombo">
      <input type="submit" name="accion" value="Ingresar">
    </form>
  </div>

  <div class="mensaje"><?= @$_REQUEST['msj'] ?></div>

</body>
</html>
