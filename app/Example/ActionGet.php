<?php
/**
 * Получение
 *
 * @version 28.03.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileInfo;
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
     * @version 28.03.2019
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            $data = $record->as_array();

            if (!empty($data['files'])) {
                $files_ids = explode(',', $data['files']);
                $files_info = (new FileInfo())->getMany($files_ids);

                if (isset($files_info['errors'])) {
                    $data['files'] = [];
                } else {
                    $data['files'] = $files_info['data'];
                }
            }

            return Response::data($data);
        } else {
            return Response::error404('Запись не найдена');
        }
    }
}
