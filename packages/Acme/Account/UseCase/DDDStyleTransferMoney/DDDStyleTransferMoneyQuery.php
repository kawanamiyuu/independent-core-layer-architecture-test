<?php

declare(strict_types=1);

namespace Acme\Account\UseCase\DDDStyleTransferMoney;

use Acme\Account\Domain\Aggregates\TransferMoneyAggregate;
use Acme\Account\Domain\Exceptions\NotFoundException;
use Acme\Account\Domain\Models\Account;
use Acme\Account\Domain\Models\AccountNumber;

interface DDDStyleTransferMoneyQuery
{
    /**
     * @param AccountNumber $sourceNumber
     * @param AccountNumber $destinationNumber
     *
     * @return TransferMoneyAggregate
     */
    public function find(AccountNumber $sourceNumber, AccountNumber $destinationNumber): TransferMoneyAggregate;

    /**
     * @param AccountNumber $accountNumber
     *
     * @return Account
     * @throws NotFoundException
     */
    public function findAccount(AccountNumber $accountNumber): Account;
}
