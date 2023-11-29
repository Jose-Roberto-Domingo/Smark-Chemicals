<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ventas extends BaseController
{
    public function index()
    {
        //
    }
    public function mostrar(){
        $ventaModel = model('VentasModel');
        $data['ventas'] = $ventaModel->findAll();
     return 
     view('common/head').
     view('common/menu').
     view('Admin/ventas/mostrar',$data).
     view('common/footer');
    }
    
    
    public function agregar(){
        helper(['form', 'url']);
        $productoModel = model('ProductoModel');
        $clienteModel = model('ClienteModel');
        $empleadoModel = model('EmpleadoModel');

        $data['productos'] =$productoModel->findAll();
        $data['clientes'] = $clienteModel->findAll();
        $data['empleados'] = $empleadoModel->findAll();

        $validation = \Config\Services::validation();
        if(strtolower($this->request->getMethod()) != 'post'){
            print "";
        }
        $rules = [
            'nombreProducto'=> 'required|max_length[50]',
            'codigoProducto'=>'required',
            'ventaTotal'=>'required',
            'fechaVenta'=>'required',
            'empleado'=>'required',
            'cliente'=>'required'
        ];
        if (!$this->validate($rules)) {
            return
                view('common/head') .
                view('common/menu') .
                view('Admin/ventas/agregar', $data, ['validation' => $validation]) .
                view('common/footer');
        }
    }
    public function insert(){
        $ventaModel = model('VentasModel');
        $data = [
            "nombreProducto" => $_POST['nombreProducto'],
            "codigoProducto" => $_POST['codigoProducto'],
            "ventaTotal" => $_POST['ventaTotal'],
            "fechaVenta" => $_POST['fechaVenta'],
            "empleado" => $_POST['empleado'],
            "cliente" => $_POST['cliente'],
            "numeroSeguimiento" => bin2hex(random_bytes(5))
        ];
        $ventaModel->insert($data, false);
        return redirect('Admin/ventas/mostrar');
    }
    
    public function delete($idVenta){
        $ventaModel = model('VentasModel');
        $ventaModel->delete($idVenta);
        return redirect('Admin/ventas/mostrar');
    }
    
    public function editar($idVenta){
        $ventaModel = model('VentasModel');
        $productoModel = model('ProductoModel');
        $clienteModel = model('ClienteModel');
        $empleadoModel = model('EmpleadoModel');
        $data['productos'] =$productoModel->findAll();
        $data['clientes'] = $clienteModel->findAll();
        $data['empleados'] = $empleadoModel->findAll();
            $data['ventas'] = $ventaModel->find($idVenta);
    
            return 
            view('common/head') .
            view('common/menu') .
            view('Admin/ventas/editar',$data) .
            view('common/footer');
    }
    
    public function update(){
        $ventaModel = model('VentasModel');
        
        $data = [
            "nombreProducto" => $_POST['nombreProducto'],
            "codigoProducto" => $_POST['codigoProducto'],
            "ventaTotal" => $_POST['ventaTotal'],
            "fechaVenta" => $_POST['fechaVenta'],
            "empleado" => $_POST['empleado'],
            "cliente" => $_POST['cliente'],
            "numeroSeguimiento" => bin2hex(random_bytes(5))
        ];
        $ventaModel->update($_POST['idVenta'],$data);
        return redirect('Admin/ventas/mostrar');
    }

    public function buscar(){
        $ventaModel = model('VentasModel');
        if(isset($_GET['nombreProducto'])){
            $nombreProducto =$_GET['nombreProducto'];
            $cliente=$_GET['cliente'];
            $fechaVenta = $_GET['fechaVenta'];
            $data['ventas'] = $ventaModel->like('nombreProducto',$nombreProducto)->like('cliente',$cliente)->like('fechaVenta',$fechaVenta)->findAll();
            
        }
        else{
            $nombreProducto = "";
            $cliente ="";
            $fechaVenta="";
            $data['ventas'] = $ventaModel->findAll();
        }
        
        return 
        view('common/head') .
        view('common/menu') .
        view('Admin/ventas/buscar',$data) .
        view('common/footer');
    }
}
