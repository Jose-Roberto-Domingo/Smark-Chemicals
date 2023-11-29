<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Proveedor extends BaseController
{
    public function index()
    {
        //
    }
    public function mostrar(){
        $proveedorModel = model('ProveedorModel');
        $data['proveedores'] = $proveedorModel->findAll();
     return 
     view('common/head').
     view('common/menu').
     view('Admin/proveedor/mostrar',$data).
     view('common/footer');
    }
    
    
    public function agregar(){
        $data['title'] = "Agregar proveedor";
        $validation = \Config\Services::validation();
        if(strtolower($this->request->getMethod()) != 'post'){
            print "";
        }
        $rules = [
            'nombreEmpresa'=> 'required|max_length[50]',
            'correo'=>'required',
            'direccion'=>'required',
            'telefono'=>'required'
        ];
        if (!$this->validate($rules)) {
            return
                view('common/head') .
                view('common/menu') .
                view('Admin/proveedor/agregar', $data, ['validation' => $validation]) .
                view('common/footer');
        }
    }
    public function insert(){
        $proveedorModel = model('ProveedorModel');
        $data = [
            "nombreEmpresa" => $_POST['nombreEmpresa'],
            "correo" => $_POST['correo'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];
        $proveedorModel->insert($data, false);
        return redirect('Admin/proveedor/mostrar');
    }
    
    public function delete($idProveedor){
        $proveedorModel = model('ProveedorModel');
        $proveedorModel->delete($idProveedor);
        return redirect('Admin/proveedor/mostrar');
    }
    
    public function editar($idProveedor){
        $proveedorModel = model('ProveedorModel');
            $data['proveedores'] = $proveedorModel->find($idProveedor);
    
            return 
            view('common/head') .
            view('common/menu') .
            view('Admin/proveedor/editar',$data) .
            view('common/footer');
    }
    
    public function update(){
        $proveedorModel = model('ProveedorModel');
        $data = [
            "nombreEmpresa" => $_POST['nombreEmpresa'],
            "correo" => $_POST['correo'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];
        $proveedorModel->update($_POST['idProveedor'],$data);
        return redirect('Admin/proveedor/mostrar');
    }

    public function buscar(){
        $proveedorModel = model('ProveedorModel');
        if(isset($_GET['nombreEmpresa'])){
            $nombreEmpresa =$_GET['nombreEmpresa'];
            $correo =$_GET['correo'];
            $data['proveedores'] = $proveedorModel->like('nombreEmpresa',$nombreEmpresa)->like('correo',$correo)->findAll();
            
        }
        else{
            $nombreEmpresa = "";
            $correo ="";
            $data['proveedores'] = $proveedorModel->findAll();
        }
        
        return 
        view('common/head') .
        view('common/menu') .
        view('Admin/proveedor/buscar',$data) .
        view('common/footer');
    }
}
