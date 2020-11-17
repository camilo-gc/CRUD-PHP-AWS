<?php
    require 'config.php';
    
    $result = false;
    if(!empty($_POST)){
        $codigo = $_POST['codigo'];
        $titulo = $_POST['titulo'];
        $f_lanzamiento = $_POST['f_lanzamiento'];
        $genero = $_POST['genero'];
        $sql = "INSERT INTO pelicula(codigo, titulo, f_lanzamiento, genero) VALUES (:codigo, :titulo, :f_lanzamiento, :genero)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'codigo' => $codigo,
            'titulo' => $titulo,
            'f_lanzamiento' => $f_lanzamiento,
            'genero' => $genero
        ]);
    }
?>
<html>
    <head>
        <title>Añadir</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Agregar Pelicula</h1>
            <hr>
            <a href="index.php">Principal</a>
            <?php
                if($result) {
                    echo '<div class="alert alert-success">¡Registro Exitoso!</div>';
                }
            ?>
            <form action="add.php" method="post">

                <label for="codigo">Codigo: </label>
                <input type="text" name="codigo" id="codigo">
                <br>
                <label for="titulo">Titulo: </label>
                <input type="text" name="titulo" id="titulo">
                <br>
                <label for="f_lanzamiento">Fecha de Lanzamiento: </label>
                <input type="text" name="f_lanzamiento" id="f_lanzamiento">
                <br>
                <label for="genero">Genero: </label>
                <input type="text" name="genero" id="genero">
                <br>
                <input type="submit" value="Guardar" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>