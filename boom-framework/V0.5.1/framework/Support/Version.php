<?php

declare(strict_types=1);

namespace Boom\Support;

final class Version
{
    public function __construct(private Logger $logger)
    {
    }
    public function number(): string
    {
        return '0.2.1';
    }

    public function logger(): string
    {
        return $this->logger->name();
    }
}