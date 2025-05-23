<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TABLA BIBLIOTECAS</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(to right, #e0c3fc, #8ec5fc);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .container {
      background-color: white;
      padding: 40px;
      margin: 30px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 800px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #f7f7f7;
      font-weight: bold;
      color: #444;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .message {
      color: red;
      text-align: center;
      margin-top: 15px;
    }

    .back-button {
      display: inline-block;
      padding: 10px 20px;
      margin-bottom: 10px;
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
    <a href="indexbiblioteca.html" class="back-button">Regresar</a>
    <h2> 📋LISTADO DE BIBLIOTECAS</h2>

    <?php
      require_once '../../../modelo/persistencia/CrudBibliotecaImp.php';
      require_once '../../../modelo/entidades/biblioteca.php';

      try {
          $crud = new CrudBibliotecaImp();
          $resultado = $crud->consultarTodo();

          if (is_array($resultado) && count($resultado) > 0) {
              $cantidad = $crud->contar();
              $i = 0;
              echo '<table>';
              echo '<thead><tr><th>ID</th><th>Aforo</th><th>Área</th></tr></thead><tbody>';

              while ($cantidad > $i) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($resultado[$i]->getBibliotecaid()) . "</td>";
                  echo "<td>" . htmlspecialchars($resultado[$i]->getAforo()) . "</td>";
                  echo "<td>" . htmlspecialchars($resultado[$i]->getArea()) . "</td>";
                  echo "</tr>";
                  $i++;
              }

              echo "</tbody></table>";
          } else {
              echo "<p class='message'>No hay bibliotecas registradas.</p>";
          }
      } catch (Exception $e) {
          echo "<p class='message'>Error: No se pudieron cargar las bibliotecas.</p>";
      }
    ?>
  </div>
</body>
</html>
