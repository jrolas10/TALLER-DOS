<?php

require_once ("_db.php");

if(isset($_POST['accion'])){ 
    switch($_POST['accion']){
        case 'eliminar_material':
            eliminar_material();
        break;        

        case 'editar_material':
            editar_material();
        break;

        case 'insertar_materiales':
            insertar_materiales();
        break;    
    }
}

function insertar_materiales(){

    global $conexion;
    extract($_POST);

    // Variables donde se almacenan los valores de nuestra imagen
    $tamanoArchivo = $_FILES['foto']['size'];

    // Se realiza la lectura de la imagen
    $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);   

    // Se realiza la consulta correspondiente para guardar los datos
    $imagenFinal = mysqli_escape_string($conexion, $binariosImagen);

    $consulta = "INSERT INTO materiales (nombre, descripcion, color, precio, cantidad, cantidad_min, categorias, imagen)
    VALUES ('$nombre', '$descripcion', '$color', $precio, $cantidad, $cantidad_min, '$categorias', '$imagenFinal');" ;

    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}

function editar_material(){

    global $conexion;
    extract($_POST);

    // Variables donde se almacenan los valores de nuestra imagen
    $tamanoArchivo = $_FILES['foto']['size'];

    // Se realiza la lectura de la imagen
    $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
    $binariosImagen = fread($imagenSubida, $tamanoArchivo);   

    // Se realiza la consulta correspondiente para guardar los datos
    $imagenFinal = mysqli_escape_string($conexion, $binariosImagen);

    $consulta = "UPDATE materiales SET nombre = '$nombre', descripcion = '$descripcion', color = '$color', precio = '$precio', cantidad = '$cantidad', categorias = '$categorias', imagen = '$imagenFinal' WHERE id = $id";

    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}

function eliminar_material(){

    global $conexion;
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM materiales WHERE id = $id";
    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}
?>
