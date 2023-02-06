<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Controller;

/**
 * Изменение
 */
class ControllerSave extends Controller
{
    public function start()
    {
        $checker_checks = [
            'auth' => '',
            'role' => [
                'page' => 'example',
                'access' => 'create-update',
            ],
        ];
        $checker_result = $this->dic['checker']->run($checker_checks);
        if (is_array($checker_result) && count($checker_result) == 0) {
            $this->response->setData(
                (new ActionSave($this->dic))->run(
                    (int) $this->request->attributes->get('id'),
                    (array) $this->request->request->get('data')
                )
            );
        } else {
            $this->response->setData($checker_result);
        }

        $this->response->send();
    }
}
