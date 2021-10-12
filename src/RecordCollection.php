<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS;

use ArrayIterator;

final class RecordCollection implements \IteratorAggregate
{
    private $records = [];

    /**
     * @param RecordInterface $record the record
     * @return self
     */
    public function addRecord(RecordInterface $record): self
    {
        $this->records[] = $record;

        return $this;
    }

    /**
     * @return Record[]
     */
    public function getRecords(): array
    {
        return $this->records;
    }

    /**
     * @return void
     */
    public function clear(): void
    {
        $this->records = [];
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $return = [];

        foreach ($this->getRecords() as $record) {
            $return[] = $record->toArray();
        }

        return $return;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->toArray());
    }
}
