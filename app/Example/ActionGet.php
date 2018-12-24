<?php
/**
 * Получение
 *
 * @version 24.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Class ActionGet
 *
 * @package Lemurro\Api\App\Example
 */
class ActionGet extends Action
{
    /**
     * Выполним действие
     *
     * @param integer $id ИД записи
     *
     * @return array
     *
     * @version 24.12.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            return Response::data($record->as_array());
        } else {
            return Response::error(
                '404 Not Found',
                'info',
                'Запись не найдена'
            );
        }
    }
}
