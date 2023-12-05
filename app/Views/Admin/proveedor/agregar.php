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
<div class="container">
    <div class="row">
    <?php
            if (isset($validation)) {
                print $validation->listErrors();
            }
        ?>
        <div class="col-4"></div>
        <div class="col-4">
        <center><h2>Agregar Proveedor</h2></center>
            <form action="<?= base_url('Admin/proveedor/insert'); ?>" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nombreEmpresa" class="form-label">Nombre de la Empresa</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="nombreEmpresa" id="nombreEmpresa" required="required">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" minlength="3" maxlength="30" class="form-control" name="correo" id="correo" required="required">
                </div>
                
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="direccion" id="direccion" required="required">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" minlength="3" maxlength="12" class="form-control" name="telefono" id="telefono" required="required">
                </div>

                <br>
                <center><div class="mb-3">
                    <input type="submit" class="btn btn-success">
                    <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/proveedor/mostrar'); ?>">Cancelar</a>
                </div>
                </center>
                </br>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>