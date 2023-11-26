<?php

namespace Points\Lib\Controller; // Исправление пространства имён

use Bitrix\Main\Engine\Controller;

class BalanceController extends Controller
{
    public function indexAction(): ? array
    {
        $responseData = [
            'message' => 'Привет из моего модуля!',
        ];
        return $responseData->toArray();
    }
}

?>
