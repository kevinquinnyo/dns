<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS\Records;

use kevinquinnyo\DNS\NSRecordInterface;

final class NS extends AbstractRecord implements NSRecordInterface
{
    public const RECORD_TYPE = 'NS';

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
            'target',
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
            ->setTarget($data['target']);
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
    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTarget(): string
    {
        return $this->target;
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
            'target' => $this->getTarget(),
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
            $this->getTarget()
        );
    }
}
