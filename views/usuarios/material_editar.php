<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<body>

<div class="container">
    <div class="col-sm-6 offset-3 mt-5">
        <form action="../../includes/_functions.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $materiales['nombre']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion *</label>
                        <input type="text" id="descripcion" name="descripcion" value="<?php echo $materiales['descripcion']; ?>" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="color" class="form-label">Color *</label>
                        <input type="text" id="color" name="color" value="<?php echo $materiales['color']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio *</label>
                        <input type="number" id="precio" name="precio" value="<?php echo $materiales['precio']; ?>" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad *</label>
                        <input type="number" id="cantidad" name="cantidad" value="<?php echo $materiales['cantidad']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="cantidamin" class="form-label">Cantidad minima *</label>
                        <input type="number" id="cantidamin" name="cantidamin" value="<?php echo $materiales['cantidad_min']; ?>" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label for="categorias" class="form-label">Categorias *</label>
                        <select name="categorias" id="categorias" class="form-control" required>
                            <option value="electronico">electronico</option>
                            <option value="cocina">cocina</option>
                            <option value="farmaceutico">farmaceutico</option>
                            <option value="mascotas">mascotas</option>
                            <option value="jugueteria">jugueteria</option>
                            <option value="automovilistico">automovilistico</option>
                            <option value="vestimenta">vestimenta</option>
                            <option value="telefonia">telefonia</option>
                            <option value="deportes">deportes</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="foto" class="form-label">Foto *</label>
                            <input type="file" class="form-control-file" name="foto" id="foto" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <input type="hidden" name="accion" value="editar_material">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>
