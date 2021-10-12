<?php
declare(strict_types=1);
namespace kevinquinnyo\Test;

use PHPUnit\Framework\TestCase;
use kevinquinnyo\DNS\DNS;
use kevinquinnyo\DNS\Records\A;
use kevinquinnyo\DNS\Records\NS;
use kevinquinnyo\DNS\Resolvers\PhpResolver;
use kevinquinnyo\DNS\Resolvers\TestingResolver;

final class NSTest extends TestCase
{
    public function testToString(): void
    {
        $records = (new DNS(new TestingResolver()))->resolve('doesnt-matter.com', NS::RECORD_TYPE)
            ->getRecords();

        $recordOne = $records[0] ?? null;
        $recordTwo = $records[1] ?? null;

        $this->assertEquals('example.com    1234    IN    NS    ns1.example.com', $recordOne->toString());
        $this->assertEquals('example.com    5678    IN    NS    ns2.example.com', $recordTwo->toString());
    }
}
