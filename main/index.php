<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("main");
?><p style="text-align: center;">
 <br>
</p>
 <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"",
	Array(
		"FORGOT_PASSWORD_URL" => "/auth/forget.php",
		"PROFILE_URL" => "/auth/personal.php",
		"REGISTER_URL" => "/auth/register.php",
		"SHOW_ERRORS" => "N"
	)
);?>


<?

global $USER;

if ($USER->IsAuthorized()) {
    $userID = $USER->GetID();
    $userData = CUser::GetByID($userID)->Fetch();
    $balance = $userData["BALANCE"];
?> <br>
 <br>
<h1> <b>Ваш баланс: <? echo $balance ?></b>&nbsp;</h1>
<h1><b>Ваш ID: <? echo $userID ?></b> </h1>
 <?
    
} else {
    echo "";
}
?><br>
<?php
global $USER;

if ($USER->IsAuthorized()) {
    ?>
<form action="/main/handlers/balance_handler.php" method="post">
    <label for="debit">Списать баллы:</label>
    <input type="number" id="debit" name="debit_amount" min="1" max="<? $balance ?>" required>
    <button type="submit" name="debit_submit">Списать</button>
</form>

<form action="/main/handlers/balance_handler.php" method="post">
    <label for="credit">Начислить баллы:</label>
    <input type="number" id="credit" name="credit_amount" min="1" required>
    <button type="submit" name="credit_submit">Начислить</button>
</form>

<? } $APPLICATION->IncludeComponent(
	"lc:history.transactions",
	".default",
	Array(
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>