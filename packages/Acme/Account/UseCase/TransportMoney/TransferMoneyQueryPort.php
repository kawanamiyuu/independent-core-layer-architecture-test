<?php

declare(strict_types=1);

namespace Core\Account\UseCase\TransportMoney;

use Core\Account\Domain\Exceptions\NotFoundException;
use Core\Account\Domain\Models\Account;
use Core\Account\Domain\Models\AccountNumber;

interface TransferMoneyQueryPort
{
    /**
     * @param AccountNumber $accountNumber
     *
     * @return Account
     */
    public function findAndLockAccount(AccountNumber $accountNumber): Account;

    /**
     * @param AccountNumber $accountNumber
     *
     * @return Account
     * @throws NotFoundException
     */
    public function findAccount(AccountNumber $accountNumber): Account;
}
