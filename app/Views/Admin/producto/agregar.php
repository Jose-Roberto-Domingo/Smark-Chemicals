<style>
    container {
            margin-top: 50px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-success {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-success:hover {
        background-color: #218838;
    }
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
<br><div class="container">
    <div class="row">
    <?php
            if (isset($validation)) {
                print $validation->listErrors();
            }
        ?>
        <div class="col-4"></div>
        <div class="col-4">
            <center>
                <h2>Agregar Producto</h2>
            </center>
            <form action="<?= base_url('Admin/producto/insert'); ?>" method="POST">
            <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nombreProducto" class="form-label">Nombre del producto</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="nombreProducto" id="nombreProducto" required="required">
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="double" class="form-control" name="precio" id="precio" required="required">
                </div>

                <div class="mb-3">
                    <label for="proveedor">Proveedor</label>
                    <select name="proveedor" class="form-control">
                        <option value=""></option>
                        <?php foreach ($proveedores as $proveedor): ?>
                            <option value="<?= $proveedor->nombreEmpresa ?>">
                                <?= $proveedor->nombreEmpresa ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="empleado">Usuario</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="empleado" id="empleado" value="<?= session('nombre')?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="productoTotal" class="form-label">Total del Producto</label>
                    <input type="double" class="form-control" name="productoTotal" id="productoTotal" required="required">
                </div>

                <div class="mb-3">
                    <label for="fechaCompra" class="form-label">Fecha de Compra</label>
                    <input type="date" min="2021-01-01" max="2024-11-01" class="form-control" name="fechaCompra" id="fechaCompra" required="required">
                </div>

                <br>
                <center><div class="mb-3">
                    <input type="submit" class="btn btn-success">
                    <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/producto/mostrar'); ?>">Cancelar</a>
                </div>
                </br>
                    </center>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>