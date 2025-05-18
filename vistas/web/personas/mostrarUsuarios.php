<?php require_once "../../../controladores/ctrlPersonas.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de personas</title>

</head>
<body>

    <header>
        <!--Agregar cabezera-->
    </header>
    <br>
    <br>
    <center>
    <table border="3">
        <tr>
            <td class="title_tabla">Documento</td>
            <td class="title_tabla">Nombre</td>
            <td class="title_tabla">Apellido</td>
            <td class="title_tabla">Email</td>
        </tr>
                <?php session_start();
                $usuarios = $_SESSION['usuarios'] ?? [];?>
                
                    <?php  foreach($usuarios as $row) {?>

            <tr>   

                <td><?php echo  htmlspecialchars($row->getDocumento()); ?></td>
                <td><?php echo  htmlspecialchars($row->getNombres()); ?></td>
                <td><?php echo  htmlspecialchars($row->getApellidos());?></td>
                <td><?php echo  htmlspecialchars($row->getEmail()); ?></td>
                
 
            </tr>
        <?php } ?>
        
    </table>
    </center>
    
</body>
</html>