<?php

use Bitrix\Main\Routing\RoutingConfigurator;

return function (RoutingConfigurator $routingConfigurator) {
    $routingConfigurator->get('api-doc', [\BitrixOA\BitrixUiController::class, 'apidocAction']);

     $routingConfigurator->get('/countries', function () {
         $responseData = [
            'message' => 'Привет из моего модуля!',
        ];
        return $responseData->toArray();
    });
};


?>