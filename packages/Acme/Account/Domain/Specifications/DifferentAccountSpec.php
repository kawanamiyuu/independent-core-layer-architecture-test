<?php
declare(strict_types=1);

namespace Core\Account\Domain\Specifications;

use Core\Account\Domain\Models\Account;

final class DifferentAccountSpec
{
    /**
     * @param Account $accountA
     * @param Account $accountB
     * @return bool
     */
    public function isSatisfiedBy(Account $accountA, Account $accountB): bool
    {
        return !$accountA->accountNumber()->equals($accountB->accountNumber());
    }
}
