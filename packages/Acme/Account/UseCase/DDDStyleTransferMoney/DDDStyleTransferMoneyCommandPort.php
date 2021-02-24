<?php

declare(strict_types=1);

namespace Acme\Account\UseCase\DDDStyleTransferMoney;

use Acme\Account\Domain\Aggregates\TransferMoneyAggregate;
use Acme\Account\Domain\Models\Account;

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
