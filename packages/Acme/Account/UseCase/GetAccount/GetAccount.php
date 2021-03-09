<?php
declare(strict_types=1);

namespace Core\Account\UseCase\GetAccount;

use Core\Account\Domain\Exceptions\NotFoundException;
use Core\Account\Domain\Models\Account;
use Core\Account\Domain\Models\AccountNumber;

final class GetAccount
{
    /** @var GetAccountQueryPort */
    private $query;

    /**
     * @param GetAccountQueryPort $query
     */
    public function __construct(GetAccountQueryPort $query)
    {
        $this->query = $query;
    }

    /**
     * @param AccountNumber $accountNumber
     * @return Account
     * @throws NotFoundException
     */
    public function execute(AccountNumber $accountNumber): Account
    {
        return $this->query->findAccount($accountNumber);
    }
}
