<?php

/**
 * Изменение объекта Response перед запуском контроллера приложения
 *
 * @version 19.04.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Overrides;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Response
 *
 * @package Lemurro\Api\App\Overrides
 */
class Response
{
    /**
     * Выполним действие
     *
     * @param JsonResponse $response Объект ответа
     *
     * @return boolean
     *
     * @version 06.06.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run(JsonResponse $response)
    {
        // Здесь вы можете переопределить параметры ответа
        // $response->headers->set('My-Header', 'My value');

        return true;
    }
}
