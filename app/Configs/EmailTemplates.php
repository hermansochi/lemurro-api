<?php
/**
 * Шаблоны электронных писем
 *
 * @version 01.01.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class EmailTemplates
 *
 * @package Lemurro\Api\App\Configs
 */
class EmailTemplates
{
    // db   db d88888b  .d8b.  d8888b. d88888b d8888b.
    // 88   88 88'     d8' `8b 88  `8D 88'     88  `8D
    // 88ooo88 88ooooo 88ooo88 88   88 88ooooo 88oobY'
    // 88~~~88 88~~~~~ 88~~~88 88   88 88~~~~~ 88`8b
    // 88   88 88.     88   88 88  .8D 88.     88 `88.
    // YP   YP Y88888P YP   YP Y8888D' Y88888P 88   YD
    //
    //

    /**
     * Шапка для каждого письма
     */
    const HEADER = <<<TPL
<table border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#eee;">
    <tr>
        <td style="padding:20px;">
            <table border="0" cellpadding="10" cellspacing="0" align="center" style="width:600px;color:#444444;font-size:14px;font-family:arial,helvetica,sans-serif;line-height:1.5;border:5px #b28b6b solid;background:#fff;">
                <tbody>
                    <tr>
                        <td align="center"><img src="cid:logotype" style="max-height:60px;"></td>
                    </tr>
TPL;

    // d88888b  .d88b.   .d88b.  d888888b d88888b d8888b.
    // 88'     .8P  Y8. .8P  Y8. `~~88~~' 88'     88  `8D
    // 88ooo   88    88 88    88    88    88ooooo 88oobY'
    // 88~~~   88    88 88    88    88    88~~~~~ 88`8b
    // 88      `8b  d8' `8b  d8'    88    88.     88 `88.
    // YP       `Y88P'   `Y88P'     YP    Y88888P 88   YD
    //
    //

    /**
     * Подвал для каждого письма
     */
    const FOOTER = <<<TPL
                    <tr>
                        <td>
                            <strong>С уважением,</strong><br>
                            команда Lemurro<br>
                            <a href="mailto:info@bestion.ru" style="color:#8e694d;">info@bestion.ru</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
TPL;

    //  .d8b.  db    db d888888b db   db          .o88b.  .d88b.  d8888b. d88888b
    // d8' `8b 88    88 `~~88~~' 88   88         d8P  Y8 .8P  Y8. 88  `8D 88'
    // 88ooo88 88    88    88    88ooo88         8P      88    88 88   88 88ooooo
    // 88~~~88 88    88    88    88~~~88         8b      88    88 88   88 88~~~~~
    // 88   88 88b  d88    88    88   88         Y8b  d8 `8b  d8' 88  .8D 88.
    // YP   YP ~Y8888P'    YP    YP   YP C88888D  `Y88P'  `Y88P'  Y8888D' Y88888P
    //
    //

    /**
     * Код для входа в приложение
     */
    const AUTH_CODE = <<<TPL
<tr>
    <td>
        Добро пожаловать в приложение <strong>[APP_NAME]</strong>
    </td>
</tr>
<tr>
    <td>
        Ваш код для входа: <strong>[SECRET]</strong>
    </td>
</tr>
TPL;
}
