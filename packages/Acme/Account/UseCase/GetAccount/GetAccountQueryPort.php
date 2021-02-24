<?php

declare(strict_types=1);

namespace Acme\Account\UseCase\GetAccount;

use Acme\Account\Domain\Exceptions\NotFoundException;
use Acme\Account\Domain\Models\Account;
use Acme\Account\Domain\Models\AccountNumber;

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
