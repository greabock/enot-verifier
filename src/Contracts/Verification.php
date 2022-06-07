<?php

declare(strict_types=1);

namespace Enot\Verifier\Contracts;

interface Verification
{
    public function code(): string;

    public function userId(): mixed;

    public function operation(): string;

    public function execute(): void;

    public function isExecuted(): bool;

    public function isOutdated(): bool;
}
