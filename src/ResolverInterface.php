<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS;

interface ResolverInterface
{
    /**
     * Resolve a DNS host.
     *
     * @param string $hostname the hostname
     * @param string $type the DNS record type
     * @return array
     */
    public function resolve(string $hostname, string $type): RecordCollection;
}
