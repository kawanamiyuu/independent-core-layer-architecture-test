<?php

declare(strict_types=1);

namespace Acme\Account\UseCase\ProcedureStyleTransferMoney;

interface ProcedureStyleTransferMoneyCommandPort
{
    /**
     * @param string $accountNumber
     * @param int    $balance
     */
    public function storeBalance(string $accountNumber, int $balance): void;

    /**
     * @param array $transaction
     */
    public function addTransaction(array $transaction): void;

    /**
     * @param array $account
     */
    public function notify(array $account): void;
}
