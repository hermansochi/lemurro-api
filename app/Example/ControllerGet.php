<?php
/**
 * Получение
 *
 * @version 28.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Controller;
use Lemurro\Api\Core\Checker\Checker;

/**
 * Class ControllerGet
 *
 * @package Lemurro\Api\App\Example
 */
class ControllerGet extends Controller
{
    /**
     * Стартовый метод
     *
     * @version 28.10.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function start()
    {
        $checker_checks = [
            'auth' => '',
            'role' => [
                'page'   => 'example',
                'access' => 'read',
            ],
        ];
        $checker_result = (new Checker($this->dic))->run($checker_checks);
        if (count($checker_result) > 0) {
            $this->response->setData($checker_result);
        } else {
            $this->response->setData((new ActionGet($this->dic))->run($this->request->get('id')));
        }

        $this->response->send();
    }
}
