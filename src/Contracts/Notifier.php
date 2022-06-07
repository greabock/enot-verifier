<?php

declare(strict_types=1);

namespace Enot\Verifier\Contracts;

use Enot\Verifier\Exception\UnknownNotifier;

interface Notifier
{
    public function notify(Verification $verification);
}
