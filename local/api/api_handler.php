<?php

header('Content-Type: application/json; charset=utf-8');
use Bitrix\Main\EventManager;
use Bitrix\Main\Context;
use Bitrix\Main\Application;

class ApiHandler
{
    public function HandleCustomRoutes()
    {
        
        $request = Context::getCurrent()->getRequest();
        $uri = $request->getRequestUri();
    
        if ($uri === '/custom-route') {
            $data = array('message' => 'This is a custom route');
        } elseif ($uri === '/another-route') {
            $data = array('message' => 'This is another route');
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo strip_tags(json_encode($data));
    }
}

