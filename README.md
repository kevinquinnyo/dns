# dns
A PHP DNS resolver without dependencies

Work in progress, just for fun right now.

## Usage (as of now)
```php
use kevinquinnyo\DNS\A;
use kevinquinnyo\DNS\DNS;
use kevinquinnyo\DNS\Resolvers\PhpResolver;

$collection = (new DNS(new PhpResolver())
    ->resolve('example.com', A::RECORD_TYPE);
 ```
 This returns a `kevinquinnyo\DNS\RecordCollection` object containing all records that were resolved.  Sometimes there are more than one record returned from a DNS lookup.
 
You can iterate this object, or call `getRecords()` to get an array.

Only supports `NS` and `A` as of now. More to come.
 
