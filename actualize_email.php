<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Актуализация e-mail адресов");

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

\Bitrix\Main\Loader::includeModule('highloadblock');

if($_GET['email']){
	$hlId = 1;
	
	$email = htmlspecialchars($_GET['email']);
	
	$hlblock = HL\HighloadBlockTable::getById($hlId)->fetch();
	$entity = HL\HighloadBlockTable::compileEntity($hlblock);
	$entityClass = $entity->getDataClass();
	
	$res_hl = $entityClass::getList(array(
		'select' => array('ID', 'UF_EMAIL'),
		'filter' => array('UF_EMAIL' => $email)
	));
	if(!($res_hl->fetch())){
		$entityClass::add(array('UF_EMAIL' => $email));
echo "";
	}
}

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');