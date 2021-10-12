<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS\Resolvers;

use kevinquinnyo\DNS\RecordCollection;
use kevinquinnyo\DNS\Records\NS;
use kevinquinnyo\DNS\ResolverInterface;

class TestingResolver implements ResolverInterface
{
    private static $response = [
        [
            'host' => 'example.com',
            'class' => 'IN',
            'ttl' => 1234,
            'type' => 'NS',
            'target' => 'ns1.example.com',
        ],
        [
            'host' => 'example.com',
            'class' => 'IN',
            'ttl' => 5678,
            'type' => 'NS',
            'target' => 'ns2.example.com',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    public function resolve(string $hostname, string $type): RecordCollection
    {
        $collection = new RecordCollection();

        foreach ($this->getResponse() as $array) {
            $collection->addRecord(NS::newFromArray($array));
        }

        return $collection;
    }

    /**
     * @param array $response an array of fake record arrays
     * @return void
     */
    public static function setResponse(array $response): void
    {
        self::$response = $response;
    }

    /**
     * @return array
     */
    private static function getResponse(): array
    {
        return self::$response;
    }
}
