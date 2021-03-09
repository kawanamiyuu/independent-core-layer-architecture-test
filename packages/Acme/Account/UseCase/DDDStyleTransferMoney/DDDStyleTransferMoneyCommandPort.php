<?php

declare(strict_types=1);

namespace Core\Account\UseCase\DDDStyleTransferMoney;

use Core\Account\Domain\Aggregates\TransferMoneyAggregate;
use Core\Account\Domain\Models\Account;

interface DDDStyleTransferMoneyCommandPort
{
    /**
     * @param TransferMoneyAggregate $aggregate
     */
    public function store(TransferMoneyAggregate $aggregate): void;

    /**
     * @param Account $account
     */
    public function notify(Account $account): void;
}
