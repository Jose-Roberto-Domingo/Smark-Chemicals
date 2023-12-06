<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Compras extends BaseController
{
    public function index()
    {
        //
    }
    public function mostrar(){
        $comprasModel = model('ComprasModel');
        $data['compras'] = $comprasModel->findAll();
     return 
     view('common/head').
     view('common/menu').
     view('Admin/compras/mostrar',$data).
     view('common/footer');
    }
    
    
    public function agregar(){
        helper(['form', 'url']);
        $productoModel = model('ProductoModel');
        $proveedorModel = model('ProveedorModel');
        $empleadoModel = model('EmpleadoModel');

        $data['productos'] =$productoModel->findAll();
        $data['proveedores'] = $proveedorModel->findAll();
        $data['empleados'] = $empleadoModel->findAll();

        $validation = \Config\Services::validation();
        if(strtolower($this->request->getMethod()) != 'post'){
            print "";
        }
        $rules = [
            'nombreProducto'=> 'required|max_length[50]',
            'proveedor'=>'required',
            'precio'=>'required',
            'empleado'=>'required',
            'compraTotal'=>'required',
            'fechaCompra'=>'required'
        ];
        if (!$this->validate($rules)) {
            return
                view('common/head') .
                view('common/menu') .
                view('Admin/compras/agregar', $data, ['validation' => $validation]) .
                view('common/footer');
        }
    }
    public function insert()
{
    $comprasModel = model('ComprasModel');
    $productoModel = model('ProductoModel');

    $nombreProducto = $_POST['nombreProducto'];
    $compraTotal = $_POST['compraTotal'];
    $fechaCompra = $_POST['fechaCompra'];

    // Obtener el producto existente
    $productoExistente = $productoModel->where('nombreProducto', $nombreProducto)->first();

    if ($productoExistente) {
        // Actualizar la cantidad del producto existente
        $nuevaCantidad = $productoExistente->productoTotal + $compraTotal;

        // Actualizar el producto existente en la base de datos
        $productoModel->update($productoExistente->idProducto, ['productoTotal' => $nuevaCantidad, 'fechaCompra' => $fechaCompra]);
    }

    // Insertar la nueva compra
    $data = [
        "nombreProducto" => $nombreProducto,
        "proveedor" => $_POST['proveedor'],
        "precio" => $_POST['precio'],
        "empleado" => $_POST['empleado'],
        "compraTotal" => $compraTotal,
        "fechaCompra" => $fechaCompra,
        "numeroSeguimiento" => bin2hex(random_bytes(15))
    ];

    $comprasModel->insert($data, false);

    return redirect('Admin/compras/mostrar');
}

    
    public function delete($idCompra){
        $comprasModel = model('ComprasModel');
        $comprasModel->delete($idCompra);
        return redirect('Admin/compras/mostrar');
    }
    
    public function editar($idCompra){
        $comprasModel = model('ComprasModel');
            $data['compras'] = $comprasModel->find($idCompra);
    
            return 
            view('common/head') .
            view('common/menu') .
            view('Admin/compras/editar',$data) .
            view('common/footer');
    }
    
    public function update(){
    $comprasModel = model('ComprasModel');
    $productoModel = model('ProductoModel');

    $idCompra = $_POST['idCompra'];
    $nombreProducto = $_POST['nombreProducto'];
    $nuevoCompraTotal = $_POST['compraTotal'];

    // Obtener la compra existente
    $compraExistente = $comprasModel->find($idCompra);

    if ($compraExistente) {
        // Calcular la diferencia en la cantidad de productos
        $diferenciaCantidad = $nuevoCompraTotal - $compraExistente->compraTotal;

        // Obtener el producto asociado a la compra
        $productoExistente = $productoModel->where('nombreProducto', $nombreProducto)->first();

        if ($productoExistente) {
            // Actualizar la cantidad del producto existente
            $nuevaCantidad = $productoExistente->productoTotal + $diferenciaCantidad;

            // Actualizar el producto existente en la base de datos
            $productoModel->update($productoExistente->idProducto, ['productoTotal' => $nuevaCantidad]);
        }

        // Actualizar la información de la compra
        $data = [
            "nombreProducto" => $nombreProducto,
            "proveedor" => $_POST['proveedor'],
            "precio" => $_POST['precio'],
            "empleado" => $_POST['empleado'],
            "compraTotal" => $nuevoCompraTotal,
            "fechaCompra" => $_POST['fechaCompra']
        ];

        $comprasModel->update($idCompra, $data);

        return redirect('Admin/compras/mostrar');
    
        }
    }

    public function buscar(){
        $comprasModel = model('ComprasModel');
        if(isset($_GET['nombreProducto'])){
            $nombreProducto =$_GET['nombreProducto'];
            $numeroSeguimiento=$_GET['numeroSeguimiento'];
            $data['compras'] = $comprasModel->like('nombreProducto',$nombreProducto)->like('numeroSeguimiento',$numeroSeguimiento)->findAll();
            
        }
        else{
            $nombreProducto = "";
            $numeroSeguimiento="";
            $data['compras'] = $comprasModel->findAll();
        }
        
        return 
        view('common/head') .
        view('common/menu') .
        view('Admin/compras/buscar',$data) .
        view('common/footer');
    }
}
