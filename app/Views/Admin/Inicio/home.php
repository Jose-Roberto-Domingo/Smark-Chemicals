<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cl-icon/css/all.main.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: arial;
        color: #fff;
    }

    body {
        width: 100vw;
        height: 100vh;
        background: #081b29;
        display: grid;
        justify-content: center;
        align-content: center;
    }

    ::-webkit-input-placeholder {
        color: #eee;
    }

    .container {
        position: relative;
        width: 800px;
        height: 65vh;
        display: grid;
        grid-template-columns: 1fr 1fr;
        border: 3px solid #00ffff;
        box-shadow: 0 0 50px 0 #00a6bc;
    }

    .submit {
        border: none;
        outline: none;
        width: 288px;
        margin-top: 25px;
        padding: 10px 0;
        font-size: 20px;
        border-radius: 40px;
        letter-spacing: 1px;
        cursor: pointer;
        background: linear-gradient(45deg, #0ef, #c800ff);
    }
    .nav-link{
        text-align: center;
        border: none;
        outline: none;
        width: 288px;
        margin-top: 25px;
        padding: 10px 0;
        font-size: 20px;
        border-radius: 40px;
        letter-spacing: 1px;
        cursor: pointer;
        background: linear-gradient(45deg, #0ef, #c800ff);
    
    }

    .footer {
        margin-top: 30px;
        letter-spacing: 0.5px;
        font-size: 14px;
    }

    .link {
        color: #0ef;
        text-decoration: none;
    }

    .banner {
        position: absolute;
        top: 0;
        right: 0;
        width: 450px;
        height: 100%;
        background: linear-gradient(to right, #0ef, #c800ff);
        clip-path: polygon(0 0, 100% 0, 100% 100%, 60% 100%);
        padding-right: 70px;
        text-align: right;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
    }

    .wel_text {
        font-size: 40px;
        margin-top: -50px;
        line-height: 50px;
    }

    .para {
        margin-top: 10px;
        font-size: 18px;
        line-height: 24px;
        letter-spacing: 1px;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .title {
        font-size: 35px;
    }

    .inp {
        padding-bottom: 10px;
        border-bottom: 2px solid #eee;
    }

    .input {
        border: none;
        outline: none;
        background: none;
        width: 260px;
        margin-top: 40px;
        padding-right: 10px;
        font-size: 17px;
        color: #0ef;
    }
    select:focus option {
        color: black;
    }
</style>

<body>
    <div class="container">
        <form action="<?php base_url('Admin/Inicio/home'); ?>" method="POST">
        <?= csrf_field() ?>
            <h1 class="title">Inicio de sesión</h1>

            <div class="inp">
                <input type="text" name="nombre" id="nombre" class="input" placeholder="Usuario" required="required">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="inp">
                <input type="password" name="contraseña" id="contraseña" class="input" placeholder="Contraseña" required="required">
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="inp">
                <select name="rol" id="rol" class="input" required="required" >
                    <option value=""></option>
                    <option value="Administrador">Administrador</option>
                    <option value="Empleado">Empleado</option>
                </select>
                <i class="fa-solid fa-users"></i>
            </div>

            <button class="submit">Iniciar sesión</button>
        </form>
        <div></div>
        <div class="banner">
            <h1>Bienvenido a <br>Smark Chemicals</h1>
            <p class="para">Esta página web te ayudará<br> a registrar las Ventas,<br>Compras, Productos <br>y Proveedores</br></p>
        </div>
    </div>
</body>
</html>