<?php

declare(strict_types=1);

namespace Enot\Verifier\Contracts;

interface VerificationFactory
{
    public function create(mixed $userId, string $operation): Verification;
}
