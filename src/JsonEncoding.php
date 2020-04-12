<?php declare(strict_types=1);

namespace Qlimix\Encoding;

use Qlimix\Encoding\Decode\JsonDecode;
use Qlimix\Encoding\Encode\JsonEncode;

final class JsonEncoding implements EncodingInterface
{
    private JsonDecode $jsonDecode;
    private JsonEncode $jsonEncode;

    public function __construct(JsonDecode $jsonDecode, JsonEncode $jsonEncode)
    {
        $this->jsonDecode = $jsonDecode;
        $this->jsonEncode = $jsonEncode;
    }

    /**
     * @inheritDoc
     */
    public function decode(string $value): array
    {
        return $this->jsonDecode->decode($value);
    }

    /**
     * @inheritDoc
     */
    public function encode(array $value): string
    {
        return $this->jsonEncode->encode($value);
    }
}
