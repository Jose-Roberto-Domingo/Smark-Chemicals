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
        <center><h2>Editar Empleado</h2></center>
            <form action="<?= base_url('Admin/empleado/update'); ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="idEmpleado" value="<?= $empleados->idEmpleado ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="nombre" id="nombre" value="<?= $empleados->nombre?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" minlength="3" maxlength="30" class="form-control" name="apellidos" id="apellidos"value="<?= $empleados->apellidos?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="rol">Rol</label>
                    <select name="rol" id="rol" class="form-control">
                        <option value=""></option>
                        <?php if($empleados->rol == "Administrador"): ?>
                        <option value="Administrador" selected>Administrador</option>
                        <option value="Empleado">Empleado</option>
                        <?php else: ?>
                        <option value="Administrador" >Administrador</option>
                        <option value="Empleado" selected>Empleado</option>
                        <?php endif ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" minlength="3" maxlength="50" class="form-control" name="correo" id="correo" value="<?= $empleados->correo?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" minlength="3" maxlength="50" class="form-control" name="contraseña" id="contraseña" value="<?= $empleados->contraseña?>" required="required">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono" value="<?= $empleados->telefono?>" required="required">
                </div>
                
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" minlength="3" maxlength="50" class="form-control" name="direccion" id="direccion" value="<?= $empleados->direccion?>" required="required">
                </div>


                <br>
                <center><div class="mb-3">
                    <input type="submit" class="btn btn-success">
                    <a role="button" class="btn btn-danger" href="<?= base_url('index.php/Admin/empleado/mostrar'); ?>">Cancelar</a>
                </div>
                </center>
                </br>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>