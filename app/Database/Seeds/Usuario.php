<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
	{
		$usuario = "José Roberto";
		$password = password_hash("Jose2023", PASSWORD_DEFAULT);
		$type = "Administrador";

		$data = [
                        'usuario' => $usuario,
                        'password' => $password,
                        'type' => $type
                ];

                // Using Query Builder
        $this->db->table('t_usuario')->insert($data);
	}
}
