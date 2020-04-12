<?php declare(strict_types=1);

namespace Qlimix\Encoding\Encode;

use Qlimix\Encoding\Encode\Exception\EncodeException;
use Throwable;
use function json_encode;
use const JSON_THROW_ON_ERROR;

final class JsonEncode implements EncodeInterface
{
    private int $options;

    private int $depth;

    public function __construct(int $options = 0, int $depth = 512)
    {
        $this->options = $options;
        $this->depth = $depth;
    }

    /**
     * @inheritDoc
     */
    public function encode(array $message): string
    {
        try {
            return json_encode($message, JSON_THROW_ON_ERROR | $this->options, $this->depth);
        } catch (Throwable $exception) {
            throw new EncodeException('Failed to decode json', 0, $exception);
        }
    }
}
