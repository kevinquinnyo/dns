<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS;

use kevinquinnyo\DNS\Records\A;
use kevinquinnyo\DNS\Records\NS;

final class RecordFactory
{
    /**
     * Map the string type to the php internal integer const.
     *
     * @param string $type the type. e.g. 'NS'
     * @return int
     */
    public static function mapType(string $type): int
    {
        $map = [
            'NS' => DNS_NS,
            'A' => DNS_A,
        ];

        $type = $map[$type] ?? null;
        if (!$type) {
            throw new \InvalidArgumentException(sprintf('Unsupported type "%s".', $type));
        }

        return $type;
    }

    /**
     * Only supporting NS and A for now. If we need more we can either implement more, or scrap all of this and use something
     * like spatie/dns which does something similar.
     *
     * @param string $type the type
     * @param array $data the data array
     * @return RecordInterface
     */
    public static function create(string $type, array $data): RecordInterface
    {
        $phpType = self::mapType($type);

        switch ($phpType) {
            case DNS_NS:
                return NS::newFromArray($data);
            case DNS_A:
                return A::newFromArray($data);
            default:
                throw new \InvalidArgumentException(sprintf('Type "%s" not supported', $type));
        }
    }
}
