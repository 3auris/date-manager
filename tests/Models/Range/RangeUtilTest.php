<?php

namespace Models\Range;

use aurimasb\DateManager\Models\Range\RangeUtil;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractRangeTest
 *
 * @package Models\Range
 */
class RangeUtilTest extends TestCase
{

    private const START = 500;

    private CONST END = 300;

    /**
     * @var \aurimasb\DateManager\Models\Range\RangeUtil
     */
    private $rangeUtilMock;

    public function setUp()
    {
        $this->rangeUtilMock = new RangeUtil(self::START, self::END);
    }

    public function testIsSetStart()
    {
        $this->assertEquals(self::START, $this->rangeUtilMock->getStart());
    }

    public function testIsSetEnd()
    {
        $this->assertEquals(self::END, $this->rangeUtilMock->getEnd());
    }

    public function testIsStartSetterWorks()
    {
        $mock = $this->rangeUtilMock;
        $mock->setStart(50);

        $this->assertEquals(50, $mock->getStart());
    }

    public function testIsEndSetterWorks(): void
    {
        $mock = $this->rangeUtilMock;
        $mock->setEnd(50);

        $this->assertEquals(50, $mock->getEnd());
    }

    public function testConstructorCallsInternalMethods(): void
    {
        $mock = $this->getMockBuilder(RangeUtil::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->once())
            ->method('setStart')
            ->with($this->equalTo(self::START));

        $mock->expects($this->once())
            ->method('setEnd')
            ->with($this->equalTo(self::END));

        $reflectedClass = new \ReflectionClass(RangeUtil::class);
        $constructor = $reflectedClass->getConstructor();
        $constructor->invoke($mock, self::START, self::END);

    }

    /**
     * @dataProvider diffProvider
     * @param int $start
     * @param int $end
     * @param int $result
     */
    public function testDiff(int $start, int $end, int $result): void
    {
        $mock = $this->getMockBuilder(RangeUtil::class)
            ->setMethods(['getStart', 'getEnd'])
            ->disableOriginalConstructor()
            ->getMock();

        $mock->method('getStart')->willReturn($start);
        $mock->method('getEnd')->willReturn($end);

        $this->assertEquals($result, $mock->diff());
    }

    public function diffProvider(): array
    {
        return [
            'zero and zero'     => [0, 0, 0],
            'zero and positive' => [0, 500, 500],
            'positive and zero' => [500, 0, 500],
            'zero and minus'    => [0, -500, 500],
            'minus and zero'    => [-500, 0, 500],
        ];
    }

}
