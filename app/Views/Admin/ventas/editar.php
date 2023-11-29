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
                <h2>Editar Venta</h2>
            </center>
            <form action="<?= base_url('Admin/ventas/update'); ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="idVenta" value="<?= $ventas->idVenta ?>">
                <div class="mb-3">
                    <label for="nombreProducto" class="form-label">Nombre del producto</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="nombreProducto" id="nombreProducto" value="<?= $ventas->nombreProducto?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="codigoProducto" class="form-label">Código del Producto</label>
                    <input type="text" minlength="3" maxlength="10" class="form-control" name="codigoProducto" id="codigoProducto" value="<?= $ventas->codigoProducto?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="ventaTotal" class="form-label">Total de la venta</label>
                    <input type="double" class="form-control" name="ventaTotal" id="ventaTotal" value="<?= $ventas->ventaTotal?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="fechaVenta" class="form-label">Fecha de venta</label>
                    <input type="date" min="2021-01-01" max="2024-11-01" class="form-control" name="fechaVenta" id="fechaVenta" value="<?= $ventas->fechaVenta?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="empleado" class="form-label">Usuario</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="empleado" id="empleado" value="<?= $ventas->empleado?>" >
                    
                </div>

                <div class="mb-3">
                    <label for="cliente">Cliente</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="cliente" id="cliente" value="<?= $ventas->cliente?>" >
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