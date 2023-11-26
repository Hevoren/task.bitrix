<?php

use Bitrix\Main\Routing\RoutingConfigurator;

return function (RoutingConfigurator $routing) {
    $routing->get('/api-doc', [\BitrixOA\BitrixUiController::class, 'apidocAction']);
    $routing->get('/countries', function () {
         $responseData = [
            'message' => 'Привет из моего модуля!',
        ];
        return $responseData->toArray();
    });
};


?>