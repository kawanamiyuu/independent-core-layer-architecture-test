<?php
declare(strict_types=1);

/**
 * @var Router $router
 */

use Service\Action\DDDStyleTransferMoney\DDDStyleTransferMoneyAction;
use Service\Action\GetAccount\GetAccountAction;
use Service\Action\ProcedureStyleTransferMoney\ProcedureStyleTransferMoneyAction;
use Service\Action\TransferMoney\TransferMoneyAction;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$router->get('/accounts/{accountNumber}', GetAccountAction::class)
    ->where('accountNumber', '[A-Z][0-9]{1,10}');
$router->put('/accounts/{accountNumber}/transfer', TransferMoneyAction::class)
    ->where('accountNumber', '[A-Z][0-9]{1,10}');

$router->put('/accounts/{accountNumber}/ddd-transfer', DDDStyleTransferMoneyAction::class)
    ->where('accountNumber', '[A-Z][0-9]{1,10}');
$router->put('/accounts/{accountNumber}/procedure-transfer', ProcedureStyleTransferMoneyAction::class)
    ->where('accountNumber', '[A-Z][0-9]{1,10}');
