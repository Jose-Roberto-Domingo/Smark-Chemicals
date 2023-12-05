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
                <h2>Agregar Venta</h2>
            </center>
            <form action="<?= base_url('Admin/ventas/insert'); ?>" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nombreProducto" class="form-label">Nombre del producto</label>
                    <select name="nombreProducto" class="form-control" required="required">
                            <option value=""></option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?= $producto->nombreProducto ?>">
                                <?= $producto->nombreProducto ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ventaTotal" class="form-label">Total de la venta</label>
                    <input type="double" class="form-control" name="ventaTotal" id="ventaTotal" required="required">
                </div>

                <div class="mb-3">
                    <label for="fechaVenta" class="form-label">Fecha de venta</label>
                    <input type="date" min="2021-01-01" max="2024-11-01" class="form-control" name="fechaVenta" id="fechaVenta" required="required">
                </div>

                <div class="mb-3">
                    <label for="empleado">Usuario</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="empleado" id="empleado" value="<?= session('nombre')?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="cliente">Cliente</label>
                    <select name="cliente" class="form-control">
                        <option value=""></option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?= $cliente->nombreEmpresa ?>">
                                <?= $cliente->nombreEmpresa ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <br>
                <center><div class="mb-3">
                    <input type="submit" class="btn btn-success">
                    <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/ventas/mostrar'); ?>">Cancelar</a>
                </div>
                </br>
                    </center>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>