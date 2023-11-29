<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inicio extends BaseController
{
    public function index()
    {
        $empleadoModel = model('EmpleadoModel');
        $data['empleados'] = $empleadoModel->findAll();
    $db = db_connect();
    $sql = "SELECT Productos.*, Proveedores.nombreEmpresa, Empleados.nombre FROM Productos, Proveedores, Empleados where Productos.proveedor = Proveedores.nombreEmpresa and Productos.empleado = Empleados.nombre";
    $query = $db->query($sql);
    $data['productos'] = $query->getResult();

    return view('common/head') . 
    view('common/menu') . 
    view('Admin/Menu_Inicio/Inicio',$data) .
    view('common/footer');
    }
}
