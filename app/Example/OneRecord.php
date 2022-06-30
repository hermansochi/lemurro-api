<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;

/**
 * Получим одну запись по ИД
 */
class OneRecord extends Action
{
    /**
     * Получим одну запись по ИД
     */
    public function get(int $id): ?array
    {
        $record = $this->dbal->fetchAssociative('SELECT * FROM example WHERE id = ? AND deleted_at IS NULL', [$id]);
        if ($record === false || (int)$record['id'] !== $id) {
            return null;
        }

        return $record;
    }
}
