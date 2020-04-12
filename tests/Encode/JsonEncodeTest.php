<?php declare(strict_types=1);

namespace Qlimix\Tests\Encoding\Encode;

use PHPUnit\Framework\TestCase;
use Qlimix\Encoding\Encode\Exception\EncodeException;
use Qlimix\Encoding\Encode\JsonEncode;

final class JsonEncodeTest extends TestCase
{
    private JsonEncode $jsonEncode;

    public function setUp(): void
    {
        $this->jsonEncode = new JsonEncode();
    }

    public function testShouldEncode(): void
    {
        $this->jsonEncode->encode(['foo'=>'bar']);
        $this->addToAssertionCount(1);
    }

    public function testShouldThrowOnJsonEncodeError(): void
    {
        $this->expectException(EncodeException::class);

        $this->jsonEncode->encode(['foo'=> "\xB1\x31"]);
    }
}
