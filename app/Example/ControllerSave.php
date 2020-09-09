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
class ControllerSave extends Controller
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
                'access' => 'create-update',
            ],
        ];
        $checker_result = $this->checker->run($checker_checks);
        if (is_array($checker_result) && count($checker_result) == 0) {
            $data = json_decode($this->request->get('json'), true, 512, JSON_THROW_ON_ERROR);

            $this->response->setData((new ActionSave($this->dic))->run(
                $this->request->get('id'),
                $data
            ));
        } else {
            $this->response->setData($checker_result);
        }

        $this->response->send();
    }
}
