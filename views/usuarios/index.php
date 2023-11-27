<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<div id="content">
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <center><h1>Materiales</h1></center>
                    <a href="material_agregar.php"><input class="btn btn-primary" type="button" value="Agregar material"></a>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Color</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Cantidad minima</th>
                                    <th>Categorias</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM materiales";
                                $result = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Estilos para celdas en error
                                        if ($row['cantidad'] <= $row['cantidad_min']) {
                                            $color = '#F78E8E';
                                            $clase = 'problema';
                                        } else {
                                            $clase = 'correcto';
                                        }
                                        ?>
                                        <style>
                                            .problema {
                                                background-color: <?php echo $color ?>;
                                                color: #000000;
                                            }
                                        </style>
                                        <tr>
                                            <td <?php echo 'class="' . $row['categorias'] . '"'; ?>><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['descripcion']; ?></td>
                                            <td><?php echo $row['color']; ?></td>
                                            <td><?php echo $row['precio']; ?>$</td>
                                            <td <?php echo 'class="' . $clase . '"'; ?>><?php echo $row['cantidad']; ?></td>
                                            <td><?php echo $row['cantidad_min']; ?></td>
                                            <td><?php echo $row['categorias']; ?></td>
                                            <td><img width="100" src="data:image;base64,<?php echo base64_encode($row['imagen']); ?>" ></td>
                                            <td>
                                                <a href="material_editar.php?id=<?php echo $row['id'] ?>">
                                                    <div>
                                                        Editar
                                                    </div>
                                                </a>
                                                <a>|</a>
                                                <a href="material_eliminar.php?id=<?php echo $row['id'] ?>">
                                                    <div>
                                                        Eliminar
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr class="text-center">
                                        <td colspan="4">No existe registros</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                </div>
            </div>
        </div>
    </section>
</div>
<?php require '../../includes/_footer.php' ?>
</html>
