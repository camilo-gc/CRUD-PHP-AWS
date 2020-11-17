<?php
    require 'config.php';
    
    $queryResult = $pdo->query("SELECT * FROM pelicula");
?>
<html>
    <head>
        <title>Listar</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Listar Peliculas</h1>
            <hr>
            <a href="index.php">Principal</a>
            <table class="table">
                <tr>
                    <th>Titulo</th>
                    <th>Fecha de Lanzamiento</th>
                    <th>Genero</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';
                        echo '<td>'.$row['titulo'].'</td>';
                        echo '<td>'.$row['f_lanzamiento'].'</td>';
                        echo '<td>'.$row['genero'].'</td>';
                        echo '<td><a href="update.php?id='.$row['codigo'].'">Actualizar</a></td>';
                        echo '<td><a href="delete.php?id='.$row['codigo'].'">Eliminar</a></td>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>
