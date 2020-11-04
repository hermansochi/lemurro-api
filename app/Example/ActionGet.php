<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 30.10.2020
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileInfo;
use Lemurro\Api\Core\Helpers\Response;

/**
 * @package Lemurro\Api\App\Example
 */
class ActionGet extends Action
{
    /**
     * @param integer $id ИД записи
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 30.10.2020
     */
    public function run($id): array
    {
        $record = (new OneRecord($this->dic))->get($id);

        if ($record === null) {
            return Response::error404('Запись не найдена');
        }

        $data = (array) $record;

        if (!empty($data['files'])) {
            $files_ids = explode(',', $data['files']);
            $data['files'] = (new FileInfo())->getMany($files_ids);
        }

        return Response::data($data);
    }
}
