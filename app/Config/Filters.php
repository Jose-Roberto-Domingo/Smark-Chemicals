<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, string>
     * @phpstan-var array<string, class-string>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'sesion' => \App\Filters\sesion::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, array<string>>
     * @phpstan-var array<string, list<string>>|array<string, array<string, array<string, string>>>
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        "sesion" => [
            "before" => [
                //Filtro menu de inicio
                "/Admin/Menu_Inicio/Inicio'",
                //Filtro Producto
                "/Admin/producto/mostrar",
                "/Admin/producto/agregar",
                "/Admin/producto/buscar",
                // Filtro clientes
                "/Admin/cliente/mostrar",
                "/Admin/cliente/agregar",
                "/Admin/cliente/buscar",
                "/Admin/cliente/editar",
                // Filtro compras
                "/Admin/compras/mostrar",
                "/Admin/compras/agregar",
                "/Admin/compras/buscar",
                "/Admin/compras/editar",
                // Filtro empleado
                "/Admin/empleado/mostrar",
                "/Admin/empleado/agregar",
                "/Admin/empleado/buscar",
                "/Admin/empleado/editar",
                // Filtro proveedor
                "/Admin/proveedor/mostrar",
                "/Admin/proveedor/agregar",
                "/Admin/proveedor/buscar",
                "/Admin/proveedor/editar",
                // Filtro ventas
                "/Admin/ventas/mostrar",
                "/Admin/ventas/agregar",
                "/Admin/ventas/buscar",
                "/Admin/ventas/editar"
            ]
        ]
    ];
}
