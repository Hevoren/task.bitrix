<?php

use Bitrix\Main\Routing\RoutingConfigurator;

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/routes/custom_routes.php')) {
    $customRoutesClosure = include $_SERVER['DOCUMENT_ROOT'] . '/local/routes/custom_routes.php';
    
    if ($customRoutesClosure instanceof Closure) {
        return $customRoutesClosure;
    }
}

return function (RoutingConfigurator $routing) {
    $routing->get('/countries', function () {
         $responseData = [
            'message' => 'Привет из моего модуля!',
        ];
        return $responseData->toArray();
    });
};