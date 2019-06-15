<?php declare(strict_types=1);

namespace Qlimix\Tests\Encoding\Decode;

use PHPUnit\Framework\TestCase;
use Qlimix\Encoding\Decode\Exception\DecodeException;
use Qlimix\Encoding\Decode\JsonDecode;

final class JsonDecodeTest extends TestCase
{
    /** @var JsonDecode */
    private $jsonDecode;

    public function setUp(): void
    {
        $this->jsonDecode = new JsonDecode();
    }

    /**
     * @test
     */
    public function shouldDecode(): void
    {
        $this->jsonDecode->decode('{"foo":"bar"}');
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function shouldThrowOnJsonDecodeError(): void
    {
        $this->expectException(DecodeException::class);

        $this->jsonDecode->decode('{foo:"\xB1\x31"}');
    }
}
