<?php
/**
 * Список мероприятий
 *
 * @version 28.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Controller;
use Lemurro\Api\Core\Checker\Checker;

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
     * @version 28.10.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function start()
    {
        $checker = new Checker($this->dic);

        $checker_checks = [
            'auth' => '',
            'role' => [
                'page'   => 'example',
                'access' => 'read',
            ],
        ];
        $checker_result = $checker->run($checker_checks);
        if (count($checker_result) > 0) {
            $this->response->setData($checker_result);
        } else {
            $this->response->setData((new ActionIndex($this->dic))->run());
        }

        $this->response->send();
    }
}
