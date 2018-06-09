<?php
/**
 * Добавление новых элементов в DIC
 *
 * @version 06.06.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App;

use Pimple\Container;

/**
 * Class DIC
 *
 * @package Lemurro\Api\App
 */
class DIC
{
    /**
     * Выполним действие
     *
     * @param Container $di Контейнер
     *
     * @return boolean
     *
     * @version 06.06.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run(Container $di)
    {
        // Здесь вы можете добавлять свои элементы в контейнер
        // Используется контейнер Pimple (https://github.com/silexphp/Pimple)
        // Пример: $di['my-element'] = 'My super element';

        return true;
    }
}
