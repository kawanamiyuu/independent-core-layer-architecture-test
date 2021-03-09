<?php
declare(strict_types=1);

namespace Core\Account\UseCase\DDDStyleTransferMoney;

use Core\Account\Domain\Aggregates\TransferMoneyAggregate;
use Core\Account\Domain\Exceptions\DomainRuleException;
use Core\Account\Domain\Exceptions\NotFoundException;
use Core\Account\Domain\Models\Account;
use Core\Account\Domain\Models\AccountNumber;
use Core\Account\Domain\Models\Balance;
use Core\Account\Domain\Models\Money;
use Core\Account\Domain\Models\TransactionTime;
use Core\Account\Domain\Specifications\TransferMoneySpec;
use Core\Account\UseCase\Ports\TransactionPort;

final class DDDStyleTransferMoney
{
    /** @var DDDStyleTransferMoneyQuery */
    private $query;
    /** @var DDDStyleTransferMoneyCommandPort */
    private $command;
    /** @var TransactionPort */
    private $transaction;

    /**
     * @param DDDStyleTransferMoneyQuery $query
     * @param DDDStyleTransferMoneyCommandPort $command
     * @param TransactionPort $transaction
     */
    public function __construct(
        DDDStyleTransferMoneyQuery $query,
        DDDStyleTransferMoneyCommandPort $command,
        TransactionPort $transaction
    ) {
        $this->query = $query;
        $this->command = $command;
        $this->transaction = $transaction;
    }

    /**
     * @param AccountNumber $sourceNumber
     * @param AccountNumber $destinationNumber
     * @param Money $amount
     * @param TransactionTime $now
     * @return Balance
     */
    public function execute(
        AccountNumber $sourceNumber,
        AccountNumber $destinationNumber,
        Money $amount,
        TransactionTime $now
    ): Balance {
        return $this->transaction->transaction(function () use ($sourceNumber, $destinationNumber, $amount, $now) {
            $aggregate = $this->query->find($sourceNumber, $destinationNumber);

            if (!(new TransferMoneySpec())->isSatisfiedBy($aggregate, $amount)) {
                throw new DomainRuleException('TransferMoneySpec is not satisfied.');
            }

            $aggregate->transfer($amount, $now);

            $this->command->store($aggregate);
            $this->command->notify($aggregate->source());

            return $this->query->findAccount($sourceNumber)->balance();
        });
    }
}
