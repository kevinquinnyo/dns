<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS\Records;

use kevinquinnyo\DNS\ARecordInterface;
use kevinquinnyo\DNS\NSRecordInterface;

final class A extends AbstractRecord implements ARecordInterface
{
    public const RECORD_TYPE = 'A';

    /**
     * @param array $data the array
     * @return self
     */
    public static function newFromArray(array $data): self
    {
        $required = [
            'host',
            'class',
            'ttl',
            'type',
            'ip',
        ];

        foreach ($required as $field) {
            if (!isset($data[$field])) {
                throw new \InvalidArgumentException(sprintf('Missing required "%s"', $field));
            }
        }

        return (new self())
            ->setHost($data['host'])
            ->setClass($data['class'])
            ->setTtl($data['ttl'])
            ->setIp($data['ip']);
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return self::RECORD_TYPE;
    }

    /**
     * @param string $target the target value
     * @return self
     */
    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'host' => $this->getHost(),
            'type' => $this->getType(),
            'class' => $this->getClass(),
            'ttl' => $this->getTtl(),
            'ip' => $this->getTarget(),
            'human_readable' => $this->toString(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return sprintf(
            '%s    %d    %s    %s    %s',
            $this->getHost(),
            $this->getTtl(),
            $this->getClass(),
            self::RECORD_TYPE,
            $this->getIp()
        );
    }
}
