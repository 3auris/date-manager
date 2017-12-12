<?php
/*
 * (c) Aurimas Bachanovicius <aurimas.bachanovicius@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace aurimasb\DateManager;

/**
 * Class DateManager
 *
 * @package aurimasb\DateManager
 */
class DateManager
{

    /**
     * @param int $timestamp
     * @return string
     */
    public static function timestampToDate(int $timestamp): string
    {
        return date('Y-m-d H:i:s', $timestamp);
    }
}
