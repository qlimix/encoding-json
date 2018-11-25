<?php declare(strict_types=1);

namespace Qlimix\Encoding\Encode;

use Qlimix\Encoding\Encode\Exception\EncodeException;

final class JsonEncode implements EncodeInterface
{
    /**
     * @inheritDoc
     */
    public function encode(array $message): string
    {
        $json = json_encode($message);

        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw new EncodeException('Failed to decode json (error number '.$error.')');
        }

        return $json;
    }
}
