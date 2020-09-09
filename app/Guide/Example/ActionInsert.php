<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 09.09.2020
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;
use ORM;

/**
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionInsert extends Action
{
    /**
     * @param array $data Массив данных
     *
     * @return array
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 09.09.2020
     */
    public function run($data)
    {
        $record = ORM::for_table('guide_example')->create();
        $record->name = $data['name'];
        $record->created_at = $this->datetimenow;
        $record->save();
        if (is_object($record) && isset($record->id)) {
            $data['id'] = $record->id;

            $this->dic['datachangelog']->insert('guide_example', 'insert', $record->id, $data);

            return Response::data($data);
        } else {
            return Response::error500('Произошла ошибка при добавлении записи, попробуйте ещё раз');
        }
    }
}
