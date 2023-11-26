<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/BalanceEntityTable.php');

global $USER;

if ($USER->IsAuthorized()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (isset($_POST["debit_submit"])) {
            $debitAmount = intval($_POST["debit_amount"]);
            $userID = $USER->GetID();
            $userData = CUser::GetByID($userID)->Fetch();
            $balance = $userData["BALANCE"];
            
            if ($balance >= $debitAmount) {
                $newBalance = $balance - $debitAmount;
                
                $user = new CUser;
                $user->Update($userID, array("BALANCE" => $newBalance));
                $debitAmount = '-' . abs($debitAmount);
                BalanceEntityTable::addBalance($userID, $debitAmount);
                LocalRedirect("/");
            } else {
                LocalRedirect("/");
            }
        }
        
        if (isset($_POST["credit_submit"])) {
            $creditAmount = intval($_POST["credit_amount"]);
            $userID = $USER->GetID();
            $userData = CUser::GetByID($userID)->Fetch();
            $balance = $userData["BALANCE"];
            
            $newBalance = $balance + $creditAmount;
            
            $user = new CUser;
            $user->Update($userID, array("BALANCE" => $newBalance));
            $debitAmount = '+' . abs($creditAmount);
            BalanceEntityTable::addBalance($userID, $debitAmount);
            LocalRedirect("/");
        }
    }
} else {
    echo "";
}
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");

?>
