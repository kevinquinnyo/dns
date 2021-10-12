<?php
declare(strict_types=1);
namespace kevinquinnyo\DNS;

use kevinquinnyo\DNS\Resolvers\PhpResolver;
use kevinquinnyo\DNS\Resolvers\TestingResolver;

final class DNS
{
    private $resolver;

    /**
     * @param ResolverInterface $resolver the resolver to use
     * @return self
     */
    public function __construct(ResolverInterface $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * @return ResolverInterface
     */
    public function getResolver(): ResolverInterface
    {
        return $this->resolver ? $this->resolver : new PhpResolver();
    }

    /**
     * Resolve a DNS record.
     *
     * @param string $hostname the hostname
     * @param string $type The type
     * @return RecordCollection
     */
    public function resolve(string $hostname, string $type): RecordCollection
    {
        return $this->getResolver()->resolve($hostname, $type);
    }
}
