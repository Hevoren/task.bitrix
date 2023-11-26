<?
    use Bitrix\Main\Loader;
    use Bitrix\Main\Entity;
    
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
    global $USER;

    if ($USER->IsAuthorized()) {
        $userId = $USER->GetID();
        $nav = new \Bitrix\Main\UI\PageNavigation("nav");
        $nav->allowAllRecords(true)->setPageSize(10)->initFromUri();
    
        $result = BalanceEntityTable::getList([
            'select' => ['ID', 'BALANCE', 'TIMESTAMP'],
            'order' => ['TIMESTAMP' => 'DESC'],
            'filter' => ['USER_ID' => $userId],
            'count_total' => true,
            'offset' => $nav->getOffset(),
            'limit' => $nav->getLimit(),
        ]);
        
        while ($row = $result->fetch()) {
            $arResult['TRANSACTION_HISTORY'][] = $row;
        }
        
        $nav->setRecordCount($result->getCount());
        $arResult['NAV_OBJECT'] = $nav;
        
        $this->includeComponentTemplate();
    } else {
        echo "";
    }
?>