<?php declare(strict_types=1);

namespace Qlimix\Encoding\Decode;

use Qlimix\Encoding\Decode\Exception\DecodeException;

final class JsonDecode implements DecodeInterface
{
    /**
     * @inheritDoc
     */
    public function decode(string $message): array
    {
        $json = json_decode($message, true);

        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw new DecodeException('Failed to decode json (error number '.$error.')');
        }

        return $json;
    }
}
