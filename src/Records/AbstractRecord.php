<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS\Records;

use kevinquinnyo\DNS\RecordInterface;

abstract class AbstractRecord implements RecordInterface
{
    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var int
     */
    protected $ttl;

    /**
     * @var string
     */
    protected $target;

    /**
     * @param string $host the host
     * @return self
     */
    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $class the class, e.g. 'IN'
     * @return self
     */
    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param int $ttl the TTL
     * @return self
     */
    public function setTtl(int $ttl): self
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }
}
