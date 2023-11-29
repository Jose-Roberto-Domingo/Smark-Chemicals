<style>
    .welcome-section {
        background-color: #f8f9fa;
        padding: 40px 0;
        text-align: center;
    }

    .welcome-title {
        color: #dc3545;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 2.5em;
        margin-bottom: 20px;
    }

    .welcome-text {
        color: #6c757d;
        font-size: 1.2em;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: box-shadow 0.3s;
    }
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        max-height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 1.2em;
        margin-bottom: 10px;
        color: #343a40; /* Gris oscuro */
    }

    .card-text a {
        display: block;
        color: #6c757d;
        text-decoration: none;
        margin-bottom: 5px;
    }

    .btn-primary {
        background-color: #dc3545;
        border-color: #dc3545;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    .logo-section {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo-img {
        max-width: 400px;
        height: auto;
    }
</style>

<div class="container">
    <div class="logo-section">
        <img src="https://th.bing.com/th/id/R.51bf34a0c170c9f47c969b8fa9db6b0b?rik=P%2b8TzawMogobcw&pid=ImgRaw&r=0" alt="Logo de SmarkChemicals" class="logo-img">
    </div>
    <div class="row welcome-section">
        <div class="col-12">
            <h2 class="welcome-title">¡Bienvenido a SmarkChemicals!</h2>
            <p class="welcome-text">Somos SmarkChemicals, una empresa dedicada a<br> proporcionar soluciones de alta calidad para lavanderías. <br> Nos especializamos en la venta de productos que<br> garantizan eficiencia y resultados excepcionales en el teñido de pantalones. <br> A continuación, te presentamos algunos de nuestros destacados productos</p>
        </div>
    </div>

    <div class="row">
        <center><h2 style="color: red; font-family: Arial, sans-serif;">Tarjetas de los Productos</h2></center>
        <?php $count = 0; ?>
        <?php foreach($productos as $producto): ?>
            <?php if($count % 3 == 0 && $count != 0): ?>
                </div>
                <div class="row">
            <?php endif; ?>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?=base_url('Admin/producto/mostrar') ?>"><?=$producto->nombreProducto ?></a></h5>
                        <p class="card-text">
                            <a>Nombre: <?= $producto->nombreProducto ?></a><br>
                            <a>Código del producto : <?= $producto->codigoProducto ?></a><br>
                            <a>Total del producto : <?=$producto->productoTotal?></a><br>
                        </p>
                        <center><a href="<?= base_url('Admin/ventas/agregar')?>" class="btn btn-primary">Añadir Venta</a></center>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
        <?php endforeach ?>
    </div>
</div>
