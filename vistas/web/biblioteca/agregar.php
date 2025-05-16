<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR BIBLIOTECA</title>
    <style type="text/css">
        th{
            text-align: right;
        }
    </style>
</head>
<body>
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
</body>
</html>