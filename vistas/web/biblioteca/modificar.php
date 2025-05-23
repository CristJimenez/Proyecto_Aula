<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MODIFICAR BIBLIOTECA</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to right, #74ebd5, #9face6);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 500px;
      text-align: center;
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    input[type="submit"],
    input[type="reset"] {
      background-color: #4b6cb7;
      color: white;
      border: none;
      padding: 12px 24px;
      margin-top: 10px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #3a539b;
      transform: scale(1.03);
    }

    .message {
      margin-top: 15px;
      color: red;
    }

    .back-button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #888;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .back-button:hover {
      background-color: #666;
      transform: scale(1.03);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>MODIFICAR BIBLIOTECA</h2>

    <!-- Formulario de búsqueda -->
    <form method="post" action="../../../Controladores/ControladorBiblioteca.php">
      <input type="text" name="id" id="id" required placeholder="Ingrese el ID de la biblioteca a consultar" />
      <input type="submit" value="CONSULTAR-M" name="accion" />
    </form>

    <?php if (isset($_REQUEST['error'])) { ?>
      <p class="message"><?= htmlspecialchars($_GET['error']) ?></p>
    <?php } elseif (isset($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      $aforo = $_REQUEST['aforo'];
      $area = $_REQUEST['area'];
    ?>
      <!-- Formulario de modificación -->
      <form method="post" action="../../../controladores/ControladorBiblioteca.php">
        <input type="text" name="id" id="id" required value="<?= htmlspecialchars($id) ?>" readonly />
        <input type="number" name="aforo" id="aforo" required value="<?= htmlspecialchars($aforo) ?>" placeholder="Nuevo aforo" />
        <input type="text" name="area" id="area" required value="<?= htmlspecialchars($area) ?>" placeholder="Nueva área" />
        <input type="submit" value="MODIFICAR" name="accion" />
      </form>
    <?php } else { ?>
      <p class="message">Busque la biblioteca a modificar</p>
    <?php } ?>

    <?php if (!empty($_REQUEST['msjmod'])) { ?>
      <p class="message"><?= htmlspecialchars($_REQUEST['msjmod']) ?></p>
    <?php } ?>

    <a href="indexbiblioteca.html" class="back-button">Regresar</a>
  </div>
</body>
</html>
