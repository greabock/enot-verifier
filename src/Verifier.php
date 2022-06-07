<?php

declare(strict_types=1);

namespace Enot\Verifier;

use Enot\Verifier\Contracts\NotifierResolver;
use Enot\Verifier\Contracts\Verification;
use Enot\Verifier\Contracts\VerificationFactory;
use Enot\Verifier\Contracts\VerificationRepository;
use Enot\Verifier\Contracts\Verifier as VerifierContract;

class Verifier implements VerifierContract
{
    public function __construct(
        private readonly VerificationFactory    $factory,
        private readonly VerificationRepository $verifications,
        private readonly NotifierResolver       $notifiers,
    )
    {
    }

    /**
     * @throws Exception\UnknownNotifier
     */
    public function createVerification(string $userId, string $operation, string $transport): Verification
    {
        $verification = $this->factory->create($userId, $operation);

        $this->verifications->store($verification);

        $this->notifiers->resolve($transport)->notify($verification);

        return $verification;
    }

    public function verify(string $code, string $userId, string $operation): bool
    {
        $verification = $this->verifications->find($code, $userId, $operation);

        if (is_null($verification) || $verification->isExecuted() || $verification->isOutdated()) {
            return false;
        }

        $verification->execute();

        $this->verifications->store($verification);

        return true;
    }
}
