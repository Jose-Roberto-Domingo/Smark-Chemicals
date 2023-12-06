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
    td{
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
</style>
<script>
    function confirmarEliminar(id) {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar este elemento?");

        if (confirmacion) {
            window.location.href = "<?= base_url('index.php/Admin/producto/delete/'); ?>" + id;
        }
    }
</script>
<br><div class="container">
    <div class="row">
        
        <div class="col-12">
            <center><h2>Productos</h2></center>
            <a role="button" class="btn btn-success" href="<?= base_url('index.php/Admin/producto/agregar'); ?>">Agregar producto</a>
            <a role="button" class="btn btn-info" href="<?= base_url('index.php/Admin/producto/buscar'); ?>">Buscar producto</a>
                <table class="table2" border="1">
                    <thead>
                        <th>Nombre del producto</th>
                        <th>Precio</th>
                        <th>Proveedor</th>
                        <th>Usuario</th>
                        <th>Cantidad de Producto Total</th>
                        <th>Fecha de compra</th>
                        <th>Número de Seguimiento</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                    <?php foreach($productos as $producto):?>
                            <tr>
                                <td><?=$producto->nombreProducto?></td>
                                <td><?=$producto->precio ?></td>
                                <td><?=$producto->proveedor?></td>
                                <td><?=$producto->empleado  ?></td>
                                <td><?=$producto->productoTotal?></td>
                                <td><?=$producto->fechaCompra?></td>
                                <td><?=$producto->numeroSeguimiento ?></td>
                                <td>
                                <a class="btn btn-danger" role="button" onclick="confirmarEliminar(<?= $producto->idProducto ?>)"><i class="bi bi-trash3"></i></a>
                                    <a class="btn btn-warning" role="button" href="<?= base_url('index.php/Admin/producto/editar/'. $producto->idProducto); ?>"><i class="bi bi-pencil-square"></i></a>
                                </td>
                            </tr>
                            <?php endforeach?>
                    </tbody>
                </table>
        </div>
    </div>
</div>