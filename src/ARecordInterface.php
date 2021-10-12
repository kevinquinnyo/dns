<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS;

interface ARecordInterface extends RecordInterface
{
    /**
     * @return string
     */
    public function getIp(): string;
}
