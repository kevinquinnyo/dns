<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS;

use JsonSerializable;

interface RecordInterface extends JsonSerializable
{
    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return string
     */
    public function getClass(): string;

    /**
     * @return int
     */
    public function getTtl(): int;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function toString(): string;
}
