<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Список
 */
class ActionIndex extends Action
{
    /**
     * Список
     *
     * @return array
     */
    public function run()
    {
        $sql = <<<'SQL'
            SELECT * FROM example
            WHERE deleted_at IS NULL
            ORDER BY name ASC
            SQL;

        return Response::data($this->dbal->fetchAllAssociative($sql));
    }
}
