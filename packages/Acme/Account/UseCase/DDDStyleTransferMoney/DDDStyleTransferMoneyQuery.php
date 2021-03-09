<?php

declare(strict_types=1);

namespace Core\Account\UseCase\DDDStyleTransferMoney;

use Core\Account\Domain\Aggregates\TransferMoneyAggregate;
use Core\Account\Domain\Exceptions\NotFoundException;
use Core\Account\Domain\Models\Account;
use Core\Account\Domain\Models\AccountNumber;

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
