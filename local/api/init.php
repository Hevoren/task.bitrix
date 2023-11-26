<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/api/api_handler.php');
use Bitrix\Main\EventManager;

$handler = new ApiHandler(); // Create an instance of the Handler class
$eventManager = EventManager::getInstance();
$eventManager->addEventHandler('main', 'OnEpilog', array($handler, 'HandleCustomRoutes'));

?>