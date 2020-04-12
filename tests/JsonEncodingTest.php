<?php declare(strict_types=1);

namespace Qlimix\Tests\Encoding;

use PHPUnit\Framework\TestCase;
use Qlimix\Encoding\Decode\Exception\DecodeException;
use Qlimix\Encoding\Decode\JsonDecode;
use Qlimix\Encoding\Encode\JsonEncode;
use Qlimix\Encoding\JsonEncoding;

final class JsonEncodingTest extends TestCase
{
    private JsonEncoding $jsonEncoding;

    public function setUp(): void
    {
        $this->jsonEncoding = new JsonEncoding(new JsonDecode(), new JsonEncode());
    }

    public function testShouldDecode(): void
    {
        $this->jsonEncoding->decode('{"foo":"bar"}');
        $this->addToAssertionCount(1);
    }

    public function testShouldEncode(): void
    {
        $this->jsonEncoding->encode(['foo'=>'bar']);
        $this->addToAssertionCount(1);
    }

    public function testShouldThrowOnJsonDecodeError(): void
    {
        $this->expectException(DecodeException::class);

        $this->jsonEncoding->decode('{foo:"\xB1\x31"}');
    }
}
