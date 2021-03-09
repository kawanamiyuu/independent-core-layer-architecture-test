<?php
declare(strict_types=1);

namespace Service\Action\TransferMoney;

use Core\Account\Domain\Models\AccountNumber;
use Core\Account\Domain\Models\Money;
use Core\Account\Domain\Models\TransactionTime;
use Core\Account\UseCase\TransportMoney\TransferMoney;
use Service\Http\Requests\TransferMoneyRequest;

final class TransferMoneyAction
{
    /** @var TransferMoney */
    private $useCase;

    public function __construct(TransferMoney $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @param TransferMoneyRequest $request
     * @param string $accountNumber
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(TransferMoneyRequest $request, string $accountNumber)
    {
        $validated = $request->validated();

        $balance = $this->useCase->execute(
            AccountNumber::of($accountNumber),
            AccountNumber::of($validated['destination_number']),
            Money::of((int)$validated['money']),
            TransactionTime::now()
        );

        return response()->json([
            'balance' => $balance->asInt(),
        ]);
    }
}
