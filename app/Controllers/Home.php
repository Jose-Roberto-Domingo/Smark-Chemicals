<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() 
    {
        $data['title'] = "Empleado";
        $validation =  \Config\Services::validation();

        if (session()->get('idEmpleado')) {
            // Usuario ya autenticado, redirigir a la página deseada
            return redirect()->to('Admin/Menu_Inicio/Inicio');
        }

        if (strtolower($this->request->getMethod()) === 'post') {
            $rules = [
                'nombre' => 'required',
                'contraseña' => 'required',
                'rol'=>'required'
            ];

            if (!$this->validate($rules)) {
                return view('Admin/Inicio/home');
            }

            $nombre = $this->request->getPost('nombre');
            $contraseña = $this->request->getPost('contraseña');
            $empleadoModel = model('EmpleadoModel'); 
            $usuario = $empleadoModel->where('nombre', $nombre)
                                   ->where('contraseña', $contraseña)
                                   ->findAll();

            if ($usuario) {
                session()->setFlashdata('mensaje', '¡Inicio de sesión exitoso!');
                return redirect()->to('Admin/Menu_Inicio/Inicio');
            } else {
                $data1 ['mensaje'] = 'Error: Nombre o contraseña incorrectos.';
                return view('Admin/Inicio/home',$data1);
            }
        }
        return view('Admin/Inicio/home');
        }
        public function mostrar()
    {
        
        if (!session()->get('idEmpleado')) {
            return redirect()->to('Admin/Inicio/home');
        }

        return view('Admin/Menu_Inicio/Inicio');
    }
}
