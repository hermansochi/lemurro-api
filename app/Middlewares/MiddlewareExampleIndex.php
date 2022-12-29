<?php

namespace Lemurro\Api\App\Middlewares;

use Lemurro\Api\Core\Abstracts\Middleware;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Промежуточный слой для маршрута GET /example
 */
class MiddlewareExampleIndex extends Middleware
{
    public function execute(): JsonResponse
    {
        // YOUR CODE HERE

        return $this->response;
    }
}
