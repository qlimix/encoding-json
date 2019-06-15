<?php declare(strict_types=1);

namespace Qlimix\Encoding\Encode;

use Qlimix\Encoding\Encode\Exception\EncodeException;
use function json_encode;
use function json_last_error;
use const JSON_ERROR_NONE;

final class JsonEncode implements EncodeInterface
{
    /** @var int */
    private $options;

    /** @var int */
    private $depth;

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
        $json = json_encode($message, $this->options, $this->depth);

        if ($json === false) {
            throw new EncodeException('Failed to decode json');
        }

        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw new EncodeException('Failed to decode json (error number '.$error.')');
        }

        return $json;
    }
}
