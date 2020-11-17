<?php
    require 'config.php';
    
    $result = false;
    if(!empty($_POST)){
        $codigo = $_POST['codigo'];
        $newTitulo = $_POST['titulo'];
        $newF_lanzamiento = $_POST['f_lanzamiento'];
        $newGenero = $_POST['genero'];
        $sql = "UPDATE pelicula SET titulo=:titulo, f_lanzamiento=:f_lanzamiento, genero=:genero WHERE codigo=:codigo";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'codigo'=> $codigo,
            'titulo' => $newTitulo,
            'f_lanzamiento' => $newF_lanzamiento
            'genero' => $newGenero,
        ]);
        $tituloValue = $newTitulo;
        $f_lanzamientoValue = $newF_lanzamiento;
        $generoValue = $newGenero;
    }else{
        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM pelicula WHERE codigo=:codigo";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'codigo'=>$id
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $tituloValue = $row['codigo'];
        $f_lanzamientoValue = $row['f_lanzamiento'];
        $generoValue = $row['genero'];
    }
?>
<html>
    <head>
        <title>Actualizar</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Actualizar Peliculas</h1>
            <hr>
            <a href="list.php">Regresar</a>
            <form action="update.php" method="post">
                <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo;?>">
                <label for="titulo">Titulo: </label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $tituloValue;?>">
                <br>
                <label for="f_lanzamiento">Fecha de Lanzamiento: </label>
                <input type="text" name="f_lanzamiento" id="f_lanzamiento" value="<?php echo $f_lanzamientoValue;?>">
                <br>
                <label for="genero">Genero: </label>
                <input type="text" name="genero" id="genero" value="<?php echo $generoValue;?>">
                <br>
                <input type="submit" value="Actualizar" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>
