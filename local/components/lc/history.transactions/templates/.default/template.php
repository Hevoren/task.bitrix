<?
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    if (!empty($arResult['TRANSACTION_HISTORY'])) {
    foreach ($arResult['TRANSACTION_HISTORY'] as $transaction) {
        echo 'Дата и время ' . $transaction['TIMESTAMP'] . ', Сколько: ' . $transaction['BALANCE'] . '<br>';
    }

    $APPLICATION->IncludeComponent(
        "bitrix:main.pagenavigation",
        "",
        array(
            "NAV_OBJECT" => $arResult['NAV_OBJECT'],
            "SEF_MODE" => "N",
        ),
        false
    );
    } else {
        echo 'Тут пусто';
    }
?>