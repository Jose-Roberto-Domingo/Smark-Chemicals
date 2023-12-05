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
            window.location.href = "<?= base_url('index.php/Admin/ventas/delete/'); ?>" + id;
        }
    }
</script>
<br><div class="container">
    <div class="row">
        
        <div class="col-12">
            <center><h2>Ventas</h2></center>
            <a role="button" class="btn btn-success" href="<?= base_url('index.php/Admin/ventas/agregar'); ?>">Agregar venta</a>
            <a role="button" class="btn btn-info" href="<?= base_url('index.php/Admin/ventas/buscar'); ?>">Buscar venta</a>
                <table class="table2">
                    <thead>
                        <th>Nombre del producto</th>
                        <th>Venta Total</th>
                        <th>Fecha de venta</th>
                        <th>Usuario</th>
                        <th>Cliente</th>
                        <th>Número de Seguimiento</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                    <?php foreach($ventas as $venta):?>
                            <tr>
                                <td><?=$venta->nombreProducto?></td>
                                <td><?=$venta->ventaTotal?></td>
                                <td><?=$venta->fechaVenta?></td>
                                <td><?=$venta->empleado  ?></td>
                                <td><?=$venta->cliente?></td>
                                <td><?=$venta->numeroSeguimiento ?></td>
                                <td>
                                <a class="btn btn-danger" role="button" onclick="confirmarEliminar(<?= $venta->idVenta ?>)"><i class="bi bi-trash3"></i></a>
                                    <a class="btn btn-warning" role="button" href="<?= base_url('index.php/Admin/ventas/editar/'. $venta->idVenta); ?>"><i class="bi bi-pencil-square"></i></a>
                                </td>
                            </tr>
                            <?php endforeach?>
                    </tbody>
                </table>
        </div>
    </div>
</div>