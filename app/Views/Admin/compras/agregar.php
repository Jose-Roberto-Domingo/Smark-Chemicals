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
<script>
    // Obtener los datos de los productos y sus precios
    const productos = <?php echo json_encode($productos); ?>;
    
    // Función para actualizar el precio cuando se selecciona un producto
    function actualizarPrecio() {
        const nombreProductoInput = document.getElementById('nombreProducto');
        const precioInput = document.getElementById('precio');
        const proveedorSelect = document.getElementById('proveedor');
        
        // Obtener el precio del producto seleccionado
        const productoSeleccionado = productos.find(producto => producto.nombreProducto === nombreProductoInput.value);
        
        // Actualizar el campo de precio
        precioInput.value = productoSeleccionado ? productoSeleccionado.precio : '';
        // Actualizar el campo de proveedor
        proveedorSelect.value = productoSeleccionado ? productoSeleccionado.proveedor : '';
    }
</script>
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
                <h2>Agregar Compra</h2>
            </center>
            <form action="<?= base_url('Admin/compras/insert'); ?>" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nombreProducto" class="form-label">Nombre del producto</label>
                    <select class="form-control" name="nombreProducto" id="nombreProducto" onchange="actualizarPrecio()" required>
                        <option value=""></option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?= $producto->nombreProducto ?>">
                                <?= $producto->nombreProducto ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="proveedor">Proveedor</label>
                    <input type="text" class="form-control" name="proveedor" id="proveedor" readonly required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="double" class="form-control" name="precio" id="precio" readonly required>
                </div>

                <div class="mb-3">
                    <label for="empleado">Usuario</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="empleado" id="empleado" value="<?= session('nombre')?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="compraTotal" class="form-label">Total de la compra</label>
                    <input type="double" class="form-control" name="compraTotal" id="compraTotal" required="required">
                </div>

                <div class="mb-3">
                    <label for="fechaCompra" class="form-label">Fecha de Compra</label>
                    <input type="date" min="2021-01-01" max="2024-11-01" class="form-control" name="fechaCompra" id="fechaCompra" required="required">
                </div>

                <br>
                <center><div class="mb-3">
                    <input type="submit" class="btn btn-success">
                    <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/compras/mostrar'); ?>">Cancelar</a>
                </div>
                </br>
                    </center>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const fechaCompra = document.getElementById('fechaCompra');
        const fechaActual = new Date().toISOString().substring(0, 10);
        fechaCompra.value = fechaActual;
    });
</script>