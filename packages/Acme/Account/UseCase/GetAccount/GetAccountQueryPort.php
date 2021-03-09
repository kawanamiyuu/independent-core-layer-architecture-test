<?php

declare(strict_types=1);

namespace Core\Account\UseCase\GetAccount;

use Core\Account\Domain\Exceptions\NotFoundException;
use Core\Account\Domain\Models\Account;
use Core\Account\Domain\Models\AccountNumber;

interface GetAccountQueryPort
{
    /**
     * @param AccountNumber $accountNumber
     *
     * @return Account
     * @throws NotFoundException
     */
    public function findAccount(AccountNumber $accountNumber): Account;
}
