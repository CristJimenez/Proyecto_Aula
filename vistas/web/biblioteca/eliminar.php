<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELIMINAR BIBLIOTECA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <div>
        <center>
            <h2>ELIMINAR BIBLIOTECA</h2>
            <hr>
            <form method="post" action="../../../controladores/ControladorBiblioteca.php">
                <fieldset style="width: 35%;">
                    <tr>
                        <th>BIBLIOTECA ID:</th>
                        <td>
                            <input type="text" name="id" id="id" required
                                placeholder="INGRESE EL ID">
                            <input type="submit" value="CONSULTAR-E" name="accion">
                        </td>
                    </tr>
            </form>
            <br><br>
            <?php
            if (isset($_REQUEST['error'])) {
                echo "<p style='color:red'>" . $_GET['error'] . "</p>";
            } elseif (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $aforo = $_REQUEST['aforo'];
                $area = $_REQUEST['area'];
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">AFORO</th>
                            <th scope="col">AREA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $id ?></th>
                            <td><?= $aforo ?></td>
                            <td><?= $area ?></td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <form method="post" action="../../../controladores/ControladorBiblioteca.php " onsubmit="return confirm('¿Seguro desea eliminar este registro?')">
                    <tr>
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <td colspan="2" align="rigth">
                            <input type="submit" value="ELIMINAR" name="accion">
                        </td>
                    </tr>
                <?php
            } else {
                echo "<p stile='color: red'>BUSQUE LA BIBLIOTECA A ELIMINAR</p>";
            }
                ?>
                </fieldset>
                </form>
                <hr>
                <span style="color: red;"><?= @$_REQUEST['msjeli'] ?></span>
                <br><br>
                <a href="indexbiblioteca.html">Regresar</a>
        </center>
    </div>
</body>

</html>