<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<div id="content">
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <center><h1>Departamentos</h1></center>
                    <a href="departamento_agregar.php"><input class="btn btn-primary" type="button" value="Agregar departamento"></a>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Encargado</th>
                                    <th>Fecha Agregado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM departamentos";
                                $departamentos = mysqli_query($conexion, $sql);
                                if ($departamentos->num_rows > 0) {
                                    foreach ($departamentos as $key => $row) {
                                        ?>
                                        <!-- empieza la tabla-->
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['nombre_encargado']; ?></td>
                                            <td><?php echo $row['fecha_agregado']; ?></td>
                                            <td>
                                                <a href="departamento_editar.php?id=<?php echo $row['id']?>">
                                                    <div>
                                                        Editar
                                                    </div>
                                                </a>
                                                <a>|</a>
                                                <a href="departamento_eliminar.php?id=<?php echo $row['id']?>">
                                                    <div">
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
                                        <td colspan="5">No existen registros</td>
                                    </tr>

                                <?php
                                } ?>
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
