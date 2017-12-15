<?php
/**
 * (c) Aurimas Bachanovicius <aurimas.bachanovicius@gmail.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace aurimasb\DateManager\Models\Range;

class RangeUtil implements Range
{

    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $end;

    /**
     * RangeUtil constructor.
     *
     * @param int $start
     * @param int $end
     */
    public function __construct(int $start, int $end)
    {
        $this->setStart($start);
        $this->setEnd($end);
    }

    /**
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @param int $start
     */
    public function setStart(int $start): void
    {
        $this->start = $start;
    }

    /**
     * @return int
     */
    public function getEnd(): int
    {
        return $this->end;
    }

    /**
     * @param int $end
     */
    public function setEnd(int $end): void
    {
        $this->end = $end;
    }

    /**
     * @return int
     */
    public function diff(): int
    {
        if ($this->getEnd() > $this->getStart()) {
            return $this->getEnd() - $this->getStart();
        }

        return $this->getStart() - $this->getEnd();
    }
}
