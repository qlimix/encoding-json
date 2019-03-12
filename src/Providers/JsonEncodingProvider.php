<?php declare(strict_types=1);

namespace Qlimix\Encoding\Providers;

use Qlimix\DependencyContainer\ProviderInterface;
use Qlimix\DependencyContainer\RegistryInterface;
use Qlimix\Encoding\Decode\DecodeInterface;
use Qlimix\Encoding\Decode\JsonDecode;
use Qlimix\Encoding\Encode\EncodeInterface;

final class JsonEncodingProvider implements ProviderInterface
{
    /**
     * @inheritDoc
     */
    public function provide(RegistryInterface $registry): void
    {
        $registry->set(EncodeInterface::class, static function () {
            return new JsonDecode();
        });

        $registry->set(DecodeInterface::class, static function () {
            return new JsonDecode();
        });
    }
}
