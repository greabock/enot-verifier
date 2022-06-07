<?php

declare(strict_types=1);

namespace Enot\Verifier\Contracts;

interface VerificationRepository
{
    public function find(string $code, mixed $userId, string $operation): ?Verification;

    public function store(Verification $verification);
}
