<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$ttt = mail("belych81@mail.ru", "sdfsd", "sdfsd", "From: aleksandrita@list.ru");
var_dump($ttt);
return;
\Bitrix\Main\Loader::includeModule('sender');
use Bitrix\Sender\ContactTable;

$hlId = 1;

$list = ContactTable::getList(array(
		));
		foreach ($list as $item)
		{
			//CEvent::Send("ACTUALIZE_EMAIL", SITE_ID, array("EMAIL" => $item['CODE']));
		}
CEvent::Send("ACTUALIZE_EMAIL", SITE_ID, array("EMAIL" => 'belych81@mail.ru'));
