<?php declare(strict_types=1);

namespace Qlimix\Tests\Encoding\Decode;

use PHPUnit\Framework\TestCase;
use Qlimix\Encoding\Decode\Exception\DecodeException;
use Qlimix\Encoding\Decode\JsonDecode;

final class JsonDecodeTest extends TestCase
{
    private JsonDecode $jsonDecode;

    public function setUp(): void
    {
        $this->jsonDecode = new JsonDecode();
    }

    public function testShouldDecode(): void
    {
        $this->jsonDecode->decode('{"foo":"bar"}');
        $this->addToAssertionCount(1);
    }

    public function testShouldThrowOnJsonDecodeError(): void
    {
        $this->expectException(DecodeException::class);

        $this->jsonDecode->decode('{foo:"\xB1\x31"}');
    }
}
