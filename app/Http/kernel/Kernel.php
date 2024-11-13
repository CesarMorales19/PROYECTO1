<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Los proveedores de servicios de la aplicación.
     *
     * @var array
     */
    protected $providers = [
        // Los proveedores de servicios de tu aplicación
    ];

    /**
     * Los alias de facades para la aplicación.
     *
     * @var array
     */
    protected $aliases = [
        // Alias para facades, si es necesario
    ];

    /**
     * Los middleware de la aplicación.
     *
     * @var array
     */
    protected $middleware = [
        // Middleware globales
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    /**
     * Los middleware que se ejecutan en las rutas web.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Los middleware que se pueden asignar a las rutas individuales.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Middleware estándar de Laravel
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Tu middleware personalizado
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}
