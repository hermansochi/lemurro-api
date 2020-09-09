<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 09.09.2020
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Controller;

/**
 * @package Lemurro\Api\App\Example
 */
class ControllerRemove extends Controller
{
    /**
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 09.09.2020
     */
    public function start()
    {
        $checker_checks = [
            'auth' => '',
            'role' => [
                'page'   => 'example',
                'access' => 'delete',
            ],
        ];
        $checker_result = $this->checker->run($checker_checks);
        if (is_array($checker_result) && count($checker_result) == 0) {
            $this->response->setData((new ActionRemove($this->dic))->run($this->request->get('id')));
        } else {
            $this->response->setData($checker_result);
        }

        $this->response->send();
    }
}
