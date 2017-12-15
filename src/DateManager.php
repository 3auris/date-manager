<?php
/*
 * (c) Aurimas Bachanovicius <aurimas.bachanovicius@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace aurimasb\DateManager;

use aurimasb\DateManager\Models\Range\Range;

/**
 * Class DateManager
 *
 * @package aurimasb\DateManager
 */
class DateManager
{

    /**
     * @param int $timestamp
     *
     * @return string
     */
    public static function timestampToDate(int $timestamp): string
    {
        return gmdate('Y-m-d H:i:s', $timestamp);
    }

    /**
     * @param \aurimasb\DateManager\Models\Range\Range $range
     *
     * @return string
     */
    public static function differentBetweenTimestamps(Range $range): string
    {
        return gmdate('H:i:s', abs($range->diff()));
    }

}
