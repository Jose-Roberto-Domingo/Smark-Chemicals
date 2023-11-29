<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Producto extends BaseController
{
    public function index()
    {
        //
    }
    public function mostrar(){
        $productoModel = model('ProductoModel');
        $data['productos'] = $productoModel->findAll();
     return 
     view('common/head').
     view('common/menu').
     view('Admin/producto/mostrar',$data).
     view('common/footer');
    }
    
    
    public function agregar(){
        helper(['form', 'url']);
        $comprasModel = model('ComprasModel');
        $proveedorModel = model('ProveedorModel');
        $empleadoModel = model('EmpleadoModel');

        $data['compras'] =$comprasModel->findAll();
        $data['proveedores'] = $proveedorModel->findAll();
        $data['empleados'] = $empleadoModel->findAll();

        $validation = \Config\Services::validation();
        if(strtolower($this->request->getMethod()) != 'post'){
            print "";
        }
        $rules = [
            'nombreProducto'=> 'required|max_length[50]',
            'codigoProducto'=>'required',
            'precio'=> 'required',
            'proveedor'=>'required',
            'empleado'=>'required',
            'productoTotal'=>'required',
            'fechaCompra'=>'required'
        ];
        if (!$this->validate($rules)) {
            return
                view('common/head') .
                view('common/menu') .
                view('Admin/producto/agregar', $data, ['validation' => $validation]) .
                view('common/footer');
        }
    }
    public function insert(){
        $productoModel = model('ProductoModel');

        $data = [
            "nombreProducto" => $_POST['nombreProducto'],
            "codigoProducto" => $_POST['codigoProducto'],
            "precio"=>$_POST['precio'],
            "proveedor" => $_POST['proveedor'],
            "empleado" => $_POST['empleado'],
            "productoTotal" => $_POST['productoTotal'],
            "fechaCompra" => $_POST['fechaCompra'],
            "numeroSeguimiento" => bin2hex(random_bytes(15))
        ];
        $productoModel->insert($data, false);
        return redirect('Admin/producto/mostrar');
    }
    
    public function delete($idProducto){
        $productoModel = model('ProductoModel');
        $productoModel->delete($idProducto);
        return redirect('Admin/producto/mostrar');
    }
    
    public function editar($idProducto){
        $productoModel = model('ProductoModel');
            $data['productos'] = $productoModel->find($idProducto);
    
            return 
            view('common/head') .
            view('common/menu') .
            view('Admin/producto/editar',$data) .
            view('common/footer');
    }
    
    public function update(){
        $productoModel = model('ProductoModel');

        $data = [
            "nombreProducto" => $_POST['nombreProducto'],
            "codigoProducto" => $_POST['codigoProducto'],
            "precio"=>$_POST['precio'],
            "proveedor" => $_POST['proveedor'],
            "empleado" => $_POST['empleado'],
            "productoTotal" => $_POST['productoTotal'],
            "fechaCompra" => $_POST['fechaCompra']
        ];
        $productoModel->update($_POST['idProducto'],$data);
        return redirect('Admin/producto/mostrar');
    }

    public function buscar(){
        $productoModel = model('ProductoModel');
        if(isset($_GET['nombreProducto'])){
            $nombreProducto =$_GET['nombreProducto'];
            $codigoProducto =$_GET['codigoProducto'];
            $data['productos'] = $productoModel->like('nombreProducto',$nombreProducto)->like('codigoProducto',$codigoProducto)->findAll();
            
        }
        else{
            $nombreProducto = "";
            $codigoProducto ="";
            $data['productos'] = $productoModel->findAll();
        }
        
        return 
        view('common/head') .
        view('common/menu') .
        view('Admin/producto/buscar',$data) .
        view('common/footer');
    }
}

