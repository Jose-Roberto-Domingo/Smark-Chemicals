<style>
    table2 {
        table-layout: fixed;
        width: 800px;
        font-family: sans-serif;
        font-weight: 100;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px #0000001a;
    }

    th {
        background-color: #ffffff33;
        padding: 15px;
        color: #fff;
    }

    td {
        background-color: #ffffff33;
        padding: 15px;
        color: black;
    }

    th {
        text-align: left;
    }

    thead th {
        background-color: #55608f;
    }

    tbody tr:hover {
        background-color: #ffffff4d;
    }

    tbody td {
        position: relative;
    }

    tbody td:hover:before {
        content: "";
        position: absolute;
        background-color: #ffffff33;
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        z-index: -1;
    }

    .btn {
        padding: 5px 20px;
        margin: 5px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    container {
        margin-top: 50px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<center>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <center>
                    <h2>Buscar productos</h2>
                </center>
                <form action="<?= base_url('Admin/producto/buscar/'); ?>" method="GET">
                    <label for="nombreProducto">Nombre del Producto</label>
                    <select name="nombreProducto" class="form-control">
                    <option value=""></option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?= $producto->nombreProducto ?>">
                                <?= $producto->nombreProducto ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <label for="codigoProducto">Código del Producto</label>
                    <select name="codigoProducto" class="form-control">
                        <option value=""></option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?= $producto->codigoProducto ?>">
                                <?= $producto->codigoProducto ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <center><input type="submit" class="btn btn-success mt-4" value="Buscar">
                    </center>
                </form>
            </div>
        </div>
        <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/producto/mostrar'); ?>">Cancelar
            busqueda</a>
</center>
<br>
<center>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <center>
                <h2>Productos</h2>
            </center>
            <div class="table-responsive">
                <table class="table2" border="1">
                <thead>
                        <th>Nombre del producto</th>
                        <th>Código del producto</th>
                        <th>Precio</th>
                        <th>Proveedor</th>
                        <th>Usuario</th>
                        <th>Producto Total</th>
                        <th>Fecha de compra</th>
                        <th>Número de Seguimiento</th>
                    </thead>
                    <tbody>
                    <?php foreach($productos as $producto):?>
                            <tr>
                                <td><?=$producto->nombreProducto?></td>
                                <td><?=$producto->codigoProducto?></td>
                                <td><?=$producto->precio ?></td>
                                <td><?=$producto->proveedor?></td>
                                <td><?=$producto->empleado  ?></td>
                                <td><?=$producto->productoTotal?></td>
                                <td><?=$producto->fechaCompra?></td>
                                <td><?=$producto->numeroSeguimiento ?></td>
                            </tr>
                            <?php endforeach?>
                    </tbody>
                </table>
            </div>
            <link rel="stylesheet" href="https://codeigniter4.github.io/CodeIgniter4/incoming/pagination.html">
        </div>
    </div>
    </div>