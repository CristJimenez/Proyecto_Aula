<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR BIBLIOTECA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style type="text/css">
        th{
            text-align: right;
        }
    </style>
</head>
<body>
    <div>
    <center>
        <h2>AGREGAR BIBLIOTECA</h2>
        <hr>
        <form method="post" action="../../../controladores/ControladorBiblioteca.php">
            <fieldset style="width: 35%;">
                <tr>
                    <th>BIBLIOTECA ID:</th>
                    <td>
                        <input type="number" name="id" id="id" required
                        placeholder="INGRESE EL ID">
                    </td>
                </tr>
                <br><br>
                <tr>
                    <th>AFORO:</th>
                    <td>
                        <input type="number" name="aforo" id="aforo" required
                        placeholder="INGRESE EL AFORO">
                    </td>
                </tr>
                <br><br>
                <tr>
                    <th>AREA:</th>
                    <td>
                        <input type="text" name="area" id="area" required
                        placeholder="INGRESE EL AREA">
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td colspan="2" align="rigth">
                        <input type="reset" value="LIMPIAR">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="GUARDAR" name="accion">
                    </td>
                </tr>
            </fieldset>
        </form>
        <hr>
        <span style="color: red;"><?= @$_REQUEST['msj'] ?></span>
    </center>
    </div>
</body>
</html>