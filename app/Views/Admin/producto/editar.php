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
<div class="container">
    <div class="row">
    <div class="col-2"></div>
        <div class="col-8">
            <center>
                <h2>Editar Producto</h2>
            </center>
            <form action="<?= base_url('Admin/producto/update'); ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="idProducto" value="<?= $productos->idProducto ?>">

                <div class="mb-3">
                    <label for="nombreProducto" class="form-label">Nombre del producto</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="nombreProducto" id="nombreProducto" value="<?=$productos->nombreProducto ?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="codigoProducto" class="form-label">Código del Producto</label>
                    <input type="text" minlength="3" maxlength="10" class="form-control" name="codigoProducto" id="codigoProducto" value="<?=$productos->codigoProducto ?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="double" class="form-control" name="precio" id="precio" value="<?=$productos->precio ?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="proveedor" id="proveedor" value="<?= $productos->proveedor?>" >
                    
                </div>

                <div class="mb-3">
                    <label for="empleado" class="form-label">Usuario</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="empleado" id="empleado" value="<?= $productos->empleado?>" >
                    
                </div>

                <div class="mb-3">
                    <label for="productoTotal" class="form-label">Total del Producto</label>
                    <input type="double" class="form-control" name="productoTotal" id="productoTotal" value="<?= $productos->productoTotal?>" >
                </div>

                <div class="mb-3">
                    <label for="fechaCompra" class="form-label">Fecha de Compra</label>
                    <input type="date" min="2021-01-01" max="2024-11-01" class="form-control" name="fechaCompra" id="fechaCompra" value="<?=$productos->fechaCompra ?>" required="required">
                </div>

                <center>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success">
                    <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/producto/mostrar'); ?>">Cancelar</a>
                </div>
                </center>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>