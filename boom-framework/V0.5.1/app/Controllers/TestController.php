<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\TestService;

final class TestController
{
    public function __construct(
        private readonly TestService $service
    ) {}

    public function index(): void
    {
        echo $this->service->message();
    }
}