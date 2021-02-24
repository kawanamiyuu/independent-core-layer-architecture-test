<?php

declare(strict_types=1);

namespace Acme\Account\UseCase\TransportMoney;

use Acme\Account\Domain\Models\Account;
use Acme\Account\Domain\Models\AccountNumber;
use Acme\Account\Domain\Models\Balance;
use Acme\Account\Domain\Models\Transaction;

interface TransferMoneyCommandPort
{
    /**
     * @param AccountNumber $accountNumber
     * @param Balance       $balance
     */
    public function storeBalance(AccountNumber $accountNumber, Balance $balance): void;

    /**
     * @param Transaction $transaction
     */
    public function addTransaction(Transaction $transaction): void;

    /**
     * @param Account $account
     */
    public function notify(Account $account): void;
}
