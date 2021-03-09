<?php
declare(strict_types=1);

namespace Core\Account\Domain\Specifications;

use Core\Account\Domain\Models\Account;
use Core\Account\Domain\Models\Money;

final class WithdrawSpec
{
    /**
     * @param Account $account
     * @param Money $amount
     * @return bool
     */
    public function isSatisfiedBy(Account $account, Money $amount): bool
    {
        return !$account->balance()->lessThan($amount);
    }
}
