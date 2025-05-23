<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ELIMINAR BIBLIOTECA</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background: linear-gradient(to right, #ffecd2, #fcb69f);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 600px;
      text-align: center;
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #d9534f;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #c9302c;
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

    .message {
      color: red;
      margin-top: 10px;
    }

    .back-button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #6c757d;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .back-button:hover {
      background-color: #5a6268;
      transform: scale(1.03);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>ELIMINAR BIBLIOTECA</h2>

    <!-- Formulario para consultar biblioteca -->
    <form method="post" action="../../../Controladores/ControladorBiblioteca.php">
      <input type="text" name="id" id="id" required placeholder="Ingrese el ID de la biblioteca a eliminar">
      <input type="submit" value="CONSULTAR-E" name="accion">
    </form>

    <?php if (isset($_REQUEST['error'])) { ?>
      <p class="message"><?= htmlspecialchars($_GET['error']) ?></p>
    <?php } elseif (isset($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
      $aforo = $_REQUEST['aforo'];
      $area = $_REQUEST['area'];
    ?>
      <!-- Mostrar datos de la biblioteca a eliminar -->
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Aforo</th>
            <th>Área</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= htmlspecialchars($id) ?></td>
            <td><?= htmlspecialchars($aforo) ?></td>
            <td><?= htmlspecialchars($area) ?></td>
          </tr>
        </tbody>
      </table>

      <!-- Formulario para confirmar eliminación -->
      <form method="post" action="../../../controladores/ControladorBiblioteca.php" onsubmit="return confirm('¿Seguro que desea eliminar esta biblioteca?');">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <input type="submit" value="ELIMINAR" name="accion">
      </form>
    <?php } else { ?>
      <p class="message">Busque la biblioteca a eliminar</p>
    <?php } ?>

    <?php if (!empty($_REQUEST['msjeli'])) { ?>
      <p class="message"><?= htmlspecialchars($_REQUEST['msjeli']) ?></p>
    <?php } ?>

    <a href="indexbiblioteca.html" class="back-button">Regresar</a>
  </div>
</body>
</html>
