<style>
        .container {
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
        <div class="col-2"></div>
        <div class="col-8">
        <center><h2>Editar cliente</h2></center>
            <form action="<?= base_url('Admin/cliente/update'); ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="idCliente" value="<?= $clientes->idCliente ?>">
            
                <div class="mb-3">
                    <label for="nombreEmpresa" class="form-label">Nombre de la empresa</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="nombreEmpresa" id="nombreEmpresa" value="<?=$clientes->nombreEmpresa ?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="text" minlength="3" maxlength="30" class="form-control" name="correo" id="correo" value="<?=$clientes->correo ?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="direccion" id="direccion" value="<?=$clientes->direccion ?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" minlength="3" maxlength="12" class="form-control" name="telefono" id="telefono" value="<?=$clientes->telefono ?>" required="required">
                </div>

                <br>
                <center><div class="mb-3">
                    <input type="submit" class="btn btn-success">
                    <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/cliente/mostrar'); ?>">Cancelar</a>
                </div>
                </center>
                </br>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>