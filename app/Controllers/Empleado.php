<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Empleado extends BaseController
{
    public function index()
    {
        //
    }
    public function mostrar(){
        $empleadoModel = model('EmpleadoModel');
        $data['empleados'] = $empleadoModel->findAll();
     return 
     view('common/head').
     view('common/menu').
     view('Admin/empleado/mostrar',$data).
     view('common/footer');
    }
    
    
    public function agregar(){
        $data['title'] = "Agregar empleado";
        $validation = \Config\Services::validation();
        if(strtolower($this->request->getMethod()) != 'post'){
            print "";
        }
        $rules = [
            'nombre'=> 'required|max_length[50]',
            'apellidos'=>'required',
            'rol'=>'required',
            'correo'=>'required',
            'contraseña'=> 'required|min_length[6]',
            'telefono'=>'required',
            'direccion'=>'required'
            
        ];
        if (!$this->validate($rules)) {
            return
                view('common/head') .
                view('common/menu') .
                view('Admin/empleado/agregar', $data, ['validation' => $validation]) .
                view('common/footer');
        }
    }
    public function insert(){
        $empleadoModel = model('EmpleadoModel');
        $data = [
            "nombre" => $_POST['nombre'],
            "apellidos"=>$_POST['apellidos'],
            "rol"=>$_POST['rol'],
            "correo" => $_POST['correo'],
            "contraseña"=>$_POST['contraseña'],
            "telefono" => $_POST['telefono'],
            "direccion" => $_POST['direccion']
            
        ];
        $empleadoModel->insert($data, false);
        return redirect('Admin/empleado/mostrar');
    }
    
    public function delete($idEmpleado){
        $empleadoModel = model('EmpleadoModel');
        $empleadoModel->delete($idEmpleado);
        return redirect('Admin/empleado/mostrar');
    }
    
    public function editar($idEmpleado){
        $empleadoModel = model('EmpleadoModel');
            $data['empleados'] = $empleadoModel->find($idEmpleado);
    
            return 
            view('common/head') .
            view('common/menu') .
            view('Admin/empleado/editar',$data) .
            view('common/footer');
    }
    
    public function update(){
        $empleadoModel = model('EmpleadoModel');
        $data = [
            "nombre" => $_POST['nombre'],
            "apellidos"=>$_POST['apellidos'],
            "rol"=>$_POST['rol'],
            "correo" => $_POST['correo'],
            "contraseña"=>$_POST['contraseña'],
            "telefono" => $_POST['telefono'],
            "direccion" => $_POST['direccion']
        ];
        $empleadoModel->update($_POST['idEmpleado'],$data);
        return redirect('Admin/empleado/mostrar');
    }

    public function buscar(){
        $empleadoModel = model('EmpleadoModel');
        if(isset($_GET['nombre'])){
            $nombre =$_GET['nombre'];
            $rol =$_GET['rol'];
            $data['empleados'] = $empleadoModel->like('nombre',$nombre)->like('rol',$rol)->findAll();
            
        }
        else{
            $nombre = "";
            $rol ="";
            $data['empleados'] = $empleadoModel->findAll();
        }
        
        return 
        view('common/head') .
        view('common/menu') .
        view('Admin/empleado/buscar',$data) .
        view('common/footer');
    }
}
