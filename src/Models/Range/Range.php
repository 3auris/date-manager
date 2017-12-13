<?php

namespace aurimasb\DateManager\Models\Range;

/**
 * Interface Range
 *
 * @package aurimasb\DateManager\Models\Range
 */
interface Range
{

    /**
     * @return int
     */
    public function getStart(): int;

    /**
     * @return int
     */
    public function getEnd(): int;

    /**
     * @param int $start
     */
    public function setStart(int $start): void;

    /**
     * @param int $end
     */
    public function setEnd(int $end): void;

    /**
     * @return int
     */
    public function diff(): int;
}
