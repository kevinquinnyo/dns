<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS\Resolvers;

use kevinquinnyo\DNS\RecordCollection;
use kevinquinnyo\DNS\RecordFactory;
use kevinquinnyo\DNS\ResolverInterface;

final class PhpResolver implements ResolverInterface
{
    /**
     * {@inheritDoc}
     */
    public function resolve(string $hostname, string $type): RecordCollection
    {
        $collection = new RecordCollection();
        $result = dns_get_record($hostname, RecordFactory::mapType($type));

        foreach ($result as $array) {
            $collection->addRecord(RecordFactory::create($type, $array));
        }

        return $collection;
    }
}
