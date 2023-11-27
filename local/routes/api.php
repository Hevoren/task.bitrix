<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/BalanceEntityTable.php');

use Bitrix\Main\Entity;
use Bitrix\Main\Routing\RoutingConfigurator;
use Local\Modules\points\BalanceController;
use CUser;

return function (RoutingConfigurator $routes) {
    $routes->get('/balance/{userID}', function ($userID) {
        if (CUser::GetByID($userID)->Fetch()["ID"]) {
            $userData = CUser::GetByID($userID)->Fetch();
            $balance = $userData["BALANCE"];
            return array("balance" => $balance); // Упаковываем значение в ассоциативный массив
        } else {
            return "Пользователь не найден";
        }
    });
    
    $routes->get('/balance-history/{userID}', function ($userID) {
        $user = CUser::GetByID($userID)->Fetch();
        if ($user["ID"]) {
            $filteredBalanceData = BalanceEntityTable::getList(array(
                'select' => array('*'),
                'filter' => array('=USER_ID' => $userID),
            ));
            $balances = array();
            while ($balance = $filteredBalanceData->fetch()) {
                $balances[] = $balance;
            }
            return $balances;
        } else {
            return "Пользователь не найден";
        }
    });
};
