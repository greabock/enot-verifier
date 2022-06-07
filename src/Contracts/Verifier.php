<?php

declare(strict_types=1);

namespace Enot\Verifier\Contracts;

interface Verifier
{
    public function createVerification(string $userId, string $operation, string $transport): Verification;

    public function verify(string $code, string $userId, string $operation): bool;
}
