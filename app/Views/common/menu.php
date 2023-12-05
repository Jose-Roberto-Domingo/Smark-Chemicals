<style>
  .navbar-nav .nav-item.active {
    background-color: #007bff;
    color: red;
  }

  .navbar {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
  }

  .navbar-brand,
  .navbar-nav .nav-link {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
  }

  .navbar-brand:hover,
  .navbar-nav .nav-link:hover {
    text-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);
    transform: scale(1.05);
  }
  .logout-button {
        padding: 5px 20px;
        margin: 5px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <img src="https://th.bing.com/th/id/R.062db02c29351f8e87b9da74cc9a617c?rik=PD2ARd%2fIgZ0XpQ&pid=ImgRaw&r=0 " width="76.80" height="43.2">
    <h3 class="navbar-brand"><?= session('nombre')?></h3>
    <a class="navbar-brand" href="<?= base_url('Admin/Menu_Inicio/Inicio')?>">Smark Chemicals</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a href="<?=base_url('index.php/Admin/compras/mostrar') ?>" class="nav-link"><i class="bi bi-bag"> Compras</i></a>
        </li>
        <li class="nav-item">
        <a href="<?=base_url('Admin/ventas/mostrar') ?>" class="nav-link"><i class="bi bi-basket3"> Ventas</i></a>
        </li>
        <li class="nav-item">
        <a href="<?=base_url('Admin/producto/mostrar') ?>" class="nav-link"><i class="bi bi-card-list"> Productos</i></a>
        </li
        <li class="nav-item">
        <a href="<?=base_url('Admin/cliente/mostrar') ?>" class="nav-link"><i class="bi bi-buildings"> Clientes</i></a>
        </li>
        <li class="nav-item">
        <a href="<?=base_url('Admin/proveedor/mostrar') ?>" class="nav-link"><i class="bi bi-truck"> Proveedores</i></a>
        </li>
        <li class="nav-item">
        <a href="<?=base_url('Admin/empleado/mostrar') ?>" class="nav-link"><i class="bi bi-person-vcard"> Empleados</i></a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav ml-right">
        <li class="nav-item">
          <a class="btn btn-outline-danger logout-button" role="button" href="<?= base_url('/salir'); ?>">Cerrar sesión</a>
        </li>
      </ul>
  </div>
</nav>