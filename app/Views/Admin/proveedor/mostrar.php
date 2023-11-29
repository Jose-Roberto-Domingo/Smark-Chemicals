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
            window.location.href = "<?= base_url('index.php/Admin/proveedor/delete/'); ?>" + id;
        }
    }
</script>
<br><div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-9">
            <center><h2>Proveedor</h2></center>
            <a role="button" class="btn btn-success" href="<?= base_url('index.php/Admin/proveedor/agregar'); ?>">Agregar proveedor</a>
            <a role="button" class="btn btn-info" href="<?= base_url('index.php/Admin/proveedor/buscar'); ?>">Buscar proveedor</a>
            <div class="table-responsive">
                <table class="table2" border="1">
                    <thead class="thead">
                        <th>Nombre de la empresa</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody class="tbody">
                        <?php foreach($proveedores as $proveedor):?>
                            <tr>
                                <td><?= $proveedor->nombreEmpresa ?></td>
                                <td><?= $proveedor->correo ?></td>
                                <td><?= $proveedor->direccion ?></td>
                                <td><?= $proveedor->telefono ?></td>
                                <td>
                                    <a class="btn btn-danger" role="button" onclick="confirmarEliminar(<?= $proveedor->idProveedor ?>)"><i class="bi bi-trash3"></i></a>
                                    <a class="btn btn-warning" role="button" href="<?= base_url('index.php/Admin/proveedor/editar/' . $proveedor->idProveedor); ?>"><i class="bi bi-pencil-square"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <link rel="stylesheet" href="https://codeigniter4.github.io/CodeIgniter4/incoming/pagination.html">
        </div>
    </div>
</div>
