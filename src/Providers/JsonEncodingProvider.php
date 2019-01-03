<?php declare(strict_types=1);

namespace Qlimix\Encoding\Providers;

use Psr\Container\ContainerInterface;
use Qlimix\DependencyContainer\DependencyProviderInterface;
use Qlimix\DependencyContainer\DependencyRegistryInterface;
use Qlimix\Encoding\Decode\DecodeInterface;
use Qlimix\Encoding\Decode\JsonDecode;
use Qlimix\Encoding\Encode\EncodeInterface;

final class JsonEncodingProvider implements DependencyProviderInterface
{
    /**
     * @inheritDoc
     */
    public function provide(DependencyRegistryInterface $registry): void
    {
        $registry->set(EncodeInterface::class, static function (ContainerInterface $container) {
            return new JsonDecode();
        });

        $registry->set(DecodeInterface::class, static function (ContainerInterface $container) {
            return new JsonDecode();
        });
    }
}
