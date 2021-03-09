<?php

namespace Service\Console\Commands;

use Core\Account\Domain\Models\AccountNumber;
use Core\Account\UseCase\GetAccount\GetAccount;
use Illuminate\Console\Command;

class GetAccountCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'account:get-account {account_number}';

    /**
     * @var string
     */
    protected $description = 'Get account information';

    /** @var GetAccount */
    private $getAccount;

    /**
     * @param GetAccount $getAccount
     */
    public function __construct(GetAccount $getAccount)
    {
        parent::__construct();

        $this->getAccount = $getAccount;
    }

    /**
     * @throws \Core\Account\Domain\Exceptions\NotFoundException
     */
    public function handle()
    {
        $account = $this->getAccount->execute(
            AccountNumber::of($this->argument('account_number'))
        );

        $this->info(json_encode([
            'account_number' => $account->accountNumber()->asString(),
            'name'           => $account->name(),
            'email'          => $account->email()->asString(),
            'balance'        => $account->balance()->asInt(),
        ]));
    }
}
