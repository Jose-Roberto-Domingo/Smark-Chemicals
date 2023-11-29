<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Clientes extends BaseController
{
    public function index()
    {
        //
    }
    public function mostrar(){
        $clienteModel = model('ClienteModel');
        $data['clientes'] = $clienteModel->findAll();
     return 
     view('common/head').
     view('common/menu').
     view('Admin/cliente/mostrar',$data).
     view('common/footer');
    }
    
    
    public function agregar(){
        $data['title'] = "Agregar cliente";
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
                view('Admin/cliente/agregar', $data, ['validation' => $validation]) .
                view('common/footer');
        }
    }
    public function insert(){
        $clienteModel = model('ClienteModel');
        $data = [
            "nombreEmpresa" => $_POST['nombreEmpresa'],
            "correo" => $_POST['correo'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];
        $clienteModel->insert($data, false);
        return redirect('Admin/cliente/mostrar');
    }
    
    public function delete($idCliente){
        $clienteModel = model('ClienteModel');
        $clienteModel->delete($idCliente);
        return redirect('Admin/cliente/mostrar');
    }
    
    public function editar($idCliente){
        $clienteModel = model('ClienteModel');
            $data['clientes'] = $clienteModel->find($idCliente);
    
            return 
            view('common/head') .
            view('common/menu') .
            view('Admin/cliente/editar',$data) .
            view('common/footer');
    }
    
    public function update(){
        $clienteModel = model('ClienteModel');
        $data = [
            "nombreEmpresa" => $_POST['nombreEmpresa'],
            "correo" => $_POST['correo'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono']
        ];
        $clienteModel->update($_POST['idCliente'],$data);
        return redirect('Admin/cliente/mostrar');
    }

    public function buscar(){
        $clienteModel = model('ClienteModel');
        if(isset($_GET['nombreEmpresa'])){
            $nombreEmpresa =$_GET['nombreEmpresa'];
            $correo =$_GET['correo'];
            $data['clientes'] = $clienteModel->like('nombreEmpresa',$nombreEmpresa)->like('correo',$correo)->findAll();
            
        }
        else{
            $nombreEmpresa = "";
            $correo ="";
            $data['clientes'] = $clienteModel->findAll();
        }
        
        return 
        view('common/head') .
        view('common/menu') .
        view('Admin/cliente/buscar',$data) .
        view('common/footer');
    }
}
