<?php
declare(strict_types=1);
namespace kevinquinnyo\Test;

use PHPUnit\Framework\TestCase;
use kevinquinnyo\DNS\DNS;
use kevinquinnyo\DNS\RecordCollection;
use kevinquinnyo\DNS\Resolvers\TestingResolver;

final class DNSTest extends TestCase
{
    /**
     * Just test basic usage.
     *
     * @group curr
     */
    public function testResolve(): void
    {
        $result = (new DNS(new TestingResolver()))
            ->resolve('example.com', 'NS');

        $this->assertInstanceOf(RecordCollection::class, $result);
    }
}
