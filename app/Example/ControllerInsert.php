<?php
/**
 * Добавление
 *
 * @version 29.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Controller;

/**
 * Class ControllerInsert
 *
 * @package Lemurro\Api\App\Example
 */
class ControllerInsert extends Controller
{
    /**
     * Стартовый метод
     *
     * @version 29.10.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function start()
    {
        $checker_checks = [
            'auth' => '',
            'role' => [
                'page'   => 'example',
                'access' => 'create-update',
            ],
        ];
        $checker_result = $this->dic['checker']->run($checker_checks);
        if (count($checker_result) > 0) {
            $this->response->setData($checker_result);
        } else {
            $this->response->setData((new ActionInsert($this->dic))->run($this->request->get('data')));
        }

        $this->response->send();
    }
}
