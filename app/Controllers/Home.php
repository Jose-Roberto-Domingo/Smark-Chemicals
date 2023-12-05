<?php

namespace App\Controllers;
use App\Models\Usuarios;

class Home extends BaseController
{
    public function index()
{
    $data['title'] = "Empleado";
    $validation = \Config\Services::validation();


    if (strtolower($this->request->getMethod()) === 'post') {
        $rules = [
            'nombre' => 'required',
            'contraseña' => 'required',
            'rol' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('Admin/Inicio/home');
        }

        $nombre = $this->request->getPost('nombre');
        $contraseña = $this->request->getPost('contraseña');
        $empleadoModel = model('EmpleadoModel');
        $usuario = $empleadoModel->where('nombre', $nombre)
            ->where('contraseña', $contraseña)
            ->first(); // Utiliza first() para obtener solo un registro

        if ($usuario)   {
            // Guardar información del empleado en la sesión
            $dataSession = [
                'idEmpleado' => $usuario->idEmpleado, // Asegúrate de tener el campo correcto
                'nombre' => $usuario->nombre,
                'rol' => $usuario->rol
            ];
            $session =session();
            $session->set($dataSession);

            return redirect()->to('Admin/Menu_Inicio/Inicio');
        } else {
            return view('Admin/Inicio/home');
        }
    }

    return view('Admin/Inicio/home');
}

public function salir()
{
    // Eliminar la sesión del empleado al salir
    $session = session();
    $session->destroy();

    return view('Admin/Inicio/home');
}

}
