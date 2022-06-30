<?php

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Добавление элемента в справочник
 */
class ActionInsert extends Action
{
    /**
     * Добавление элемента в справочник
     *
     * @param array $data Массив данных
     *
     * @return array
     */
    public function run($data)
    {
        $cnt = $this->dbal->insert('guide_example', [
            'name' => $data['name'],
            'created_at' => $this->dic['datetimenow'],
        ]);
        if ($cnt !== 1) {
            return Response::error500('Произошла ошибка при добавлении записи, попробуйте ещё раз');
        }

        $id = $this->dbal->lastInsertId();

        $data['id'] = $id;

        $this->dic['datachangelog']->insert('guide_example', 'insert', $id, $data);

        return Response::data($data);
    }
}
