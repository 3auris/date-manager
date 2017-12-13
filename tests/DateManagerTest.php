<?php
declare(strict_types=1);

use aurimasb\DateManager\DateManager;
use aurimasb\DateManager\Models\Range\RangeUtil;
use PHPUnit\Framework\TestCase;

/**
 * Class DateManagerTest
 *
 * @covers DateManager
 */
class DateManagerTest extends TestCase
{

    public function testTimestampToDate(): void
    {
        $this->assertEquals('2018-11-30 23:01:01',
            DateManager::timestampToDate(1543618861)
        );
    }

    /**
     * @dataProvider timestampDoDateDiffProvider
     * @param int    $diffInt
     * @param string $diff
     */
    public function testDifferentBetweenTimestamps(
        int $diffInt,
        string $diff
    ): void {
        $rangeMock = $this->getMockBuilder(RangeUtil::class)
            ->disableOriginalConstructor()
            ->setMethods(['diff'])
            ->getMock();

        $rangeMock->method('diff')->willReturn($diffInt);

        $dateManagerDiff = DateManager::differentBetweenTimestamps($rangeMock);

        $this->assertEquals($diff, $dateManagerDiff);
    }

    public function timestampDoDateDiffProvider(): array
    {
        return [
            'diff is zero'                   => [0, '00:00:00'],
            'diff is 4 hours'                => [14400, '04:00:00'],
            'diff is 4 hours and one second' => [14401, '04:00:01'],
            'diff is minus one second'       => [-1, '00:00:01'],
            'diff is minus fife hundred'     => [-500, '00:08:20'],
        ];
    }
}
