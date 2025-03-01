<?php


namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/contacts/store',
        'api/sacs/store',
        'api/ombudsmen/store',
        'api/*', // Opcional: exclui todas as rotas da API
    ];
}
