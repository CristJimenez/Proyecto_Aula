<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA BIBLIOTECAS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once '../../../modelo/persistencia/CrudBibliotecaImp.php';
    require_once '../../../modelo/entidades/biblioteca.php';

    try {
        
    $crud = new CrudBibliotecaImp();

    $resultado = $crud->consultarTodo();

    if (is_array($resultado)) {

        $cantidad = $crud->contar();

        $i = 0;
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
            <?php

            while ($cantidad > $i) {

            ?>
                <tr>
                    <th scope="row"><?php echo $resultado[$i]->getBibliotecaid()?></th>
                    <td><?php echo $resultado[$i]->getAforo() ?></td>
                    <td><?php echo $resultado[$i]->getArea() ?></td>
                </tr>
        <?php

                $i++;
            }

            echo "</tbody>";
        } else {

           echo "<p>NO HAY BIBLIOTECAS REGISTRADAS</p>"; 

        }
    } catch (Exception $e) {
        $msj = urlencode($e->getMessage());

        echo "<p style= 'color: red'>NO HAY BIBLIOTECAS REGISTRADAS</p>"; 

    }

        ?>

</body>

</html>