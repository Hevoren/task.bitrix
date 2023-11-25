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
);?><?

global $USER;

if ($USER->IsAuthorized()) {
    $userID = $USER->GetID();
    $userData = CUser::GetByID($userID)->Fetch();
    $balance = $userData["BALANCE"];
?> <br>
 <br>
<h1><b>Ваш баланс: <? echo $balance ?></b></h1>
<?
    
} else {
    echo "Пользователь не авторизован";
}
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>