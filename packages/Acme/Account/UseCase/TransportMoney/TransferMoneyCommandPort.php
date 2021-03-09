<?php

declare(strict_types=1);

namespace Core\Account\UseCase\TransportMoney;

use Core\Account\Domain\Models\Account;
use Core\Account\Domain\Models\AccountNumber;
use Core\Account\Domain\Models\Balance;
use Core\Account\Domain\Models\Transaction;

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
