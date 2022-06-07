<?php

declare(strict_types=1);

namespace Enot\Verifier\Contracts;

interface Notifier
{
    public function notify(Verification $verification);
}
