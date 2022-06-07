<?php

declare(strict_types=1);

namespace Enot\Verifier\Contracts;

use Enot\Verifier\Exception\UnknownNotifier;

interface NotifierResolver
{
    /** @throws UnknownNotifier */
    public function resolve(string $key): Notifier;
}
