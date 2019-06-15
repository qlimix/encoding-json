<?php declare(strict_types=1);

namespace Qlimix\Encoding\Decode;

use Qlimix\Encoding\Decode\Exception\DecodeException;
use function json_decode;
use function json_last_error;
use const JSON_ERROR_NONE;

final class JsonDecode implements DecodeInterface
{
    /** @var bool */
    private $assoc;

    /** @var int */
    private $depth;

    /** @var int */
    private $options;

    public function __construct(bool $assoc = true, int $depth = 512, int $options = 0)
    {
        $this->assoc = $assoc;
        $this->depth = $depth;
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    public function decode(string $message): array
    {
        $json = json_decode($message, $this->assoc, $this->depth, $this->options);

        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw new DecodeException('Failed to decode json (error number '.$error.')');
        }

        return $json;
    }
}
