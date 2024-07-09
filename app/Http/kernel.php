<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class HttpKernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'permission' => \App\Http\Middleware\CheckPermission::class,
    ];
}