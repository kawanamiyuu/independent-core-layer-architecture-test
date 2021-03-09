<?php
declare(strict_types=1);

namespace Core\Account\Domain\Specifications;

use Core\Account\Domain\Aggregates\TransferMoneyAggregate;
use Core\Account\Domain\Models\Money;

final class TransferMoneySpec
{
    /**
     * @param TransferMoneyAggregate $aggregate
     * @param Money $amount
     * @return bool
     */
    public function isSatisfiedBy(TransferMoneyAggregate $aggregate, Money $amount): bool
    {
        return (new DifferentAccountSpec())->isSatisfiedBy($aggregate->source(), $aggregate->destination())
            && (new WithdrawSpec())->isSatisfiedBy($aggregate->source(), $amount);
    }
}
