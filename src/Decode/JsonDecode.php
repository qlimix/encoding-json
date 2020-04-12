<?php declare(strict_types=1);

namespace Qlimix\Encoding\Decode;

use Qlimix\Encoding\Decode\Exception\DecodeException;
use Throwable;
use function json_decode;
use const JSON_THROW_ON_ERROR;

final class JsonDecode implements DecodeInterface
{
    private int $depth;

    private int $options;

    public function __construct(int $depth = 512, int $options = 0)
    {
        $this->depth = $depth;
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    public function decode(string $message): array
    {
        try {
            return json_decode($message, true, $this->depth, JSON_THROW_ON_ERROR | $this->options);
        } catch (Throwable $exception) {
            throw new DecodeException('Failed to decode json', 0, $exception);
        }
    }
}
