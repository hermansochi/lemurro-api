<?php

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Список справочника
 */
class ActionIndex extends Action
{
    /**
     * Список справочника
     *
     * @return array
     */
    public function run()
    {
        $sql = <<<'SQL'
            SELECT id, name FROM guide_example
            WHERE deleted_at IS NULL
            ORDER BY name ASC
            SQL;

        $items = (array)$this->dbal->fetchAllAssociative($sql);

        return Response::data([
            'js_class' => 'guideExample',
            'count' => count($items),
            'items' => $items,
        ]);
    }
}
