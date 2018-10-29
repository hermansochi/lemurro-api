<?php
/**
 * Список мероприятий
 *
 * @version 29.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Controller;

/**
 * Class ControllerIndex
 *
 * @package Lemurro\Api\App\Example
 */
class ControllerIndex extends Controller
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
                'access' => 'read',
            ],
        ];
        $checker_result = $this->dic['checker']->run($checker_checks);
        if (count($checker_result) > 0) {
            $this->response->setData($checker_result);
        } else {
            $this->response->setData((new ActionIndex($this->dic))->run());
        }

        $this->response->send();
    }
}
