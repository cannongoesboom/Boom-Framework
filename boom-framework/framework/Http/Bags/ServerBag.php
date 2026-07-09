<?php

declare(strict_types=1);

namespace Boom\Http\Bags;

final class ServerBag extends Bag
{
    public function method(): string
    {
        return strtoupper(
            $this->get('REQUEST_METHOD', 'GET')
        );
    }

    public function host(): string
    {
        return $this->get('HTTP_HOST', 'localhost');
    }

    public function scheme(): string
    {
        return $this->isSecure()
            ? 'https'
            : 'http';
    }

    public function port(): int
    {
        return (int) $this->get('SERVER_PORT', 80);
    }

    public function isSecure(): bool
    {
        return $this->get('HTTPS') === 'on'
            || $this->port() === 443;
    }

    public function userAgent(): string
    {
        return $this->get(
            'HTTP_USER_AGENT',
            ''
        );
    }

    public function ip(): string
    {
        return $this->get(
            'REMOTE_ADDR',
            ''
        );
    }
}