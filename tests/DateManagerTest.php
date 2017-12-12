<?php
declare(strict_types=1);

use aurimasb\DateManager\DateManager;
use PHPUnit\Framework\TestCase;

/**
 * Class DateManagerTest
 *
 * @covers DateManager
 */
class DateManagerTest extends TestCase
{

    public function testStringIsCorrect(): void
    {
        $this->assertEquals(
            '2018-11-30 23:00:00',
            DateManager::timestampToDate(1543618800)
        );

        $this->assertEquals(
            '2017-12-12 11:39:18',
            DateManager::timestampToDate(1513078758)
        );

        $this->assertEquals(
            '2011-08-11 16:05:58',
            DateManager::timestampToDate(1313078758)
        );
    }
}
