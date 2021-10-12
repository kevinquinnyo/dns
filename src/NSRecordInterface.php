<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS;

interface NSRecordInterface extends RecordInterface
{
    /**
     * @return string
     */
    public function getTarget(): string;
}
