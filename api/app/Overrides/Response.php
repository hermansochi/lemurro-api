<?php

namespace Lemurro\Api\App\Overrides;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Изменение объекта Response перед запуском контроллера приложения
 */
class Response
{
    /**
     * Изменение объекта Response перед запуском контроллера приложения
     */
    public function run(JsonResponse $response): void
    {
        // Здесь вы можете переопределить параметры ответа
        // $response->headers->set('My-Header', 'My value');
    }
}
