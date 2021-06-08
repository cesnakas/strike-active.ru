<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule("catalog");
Loader::includeModule("sale");

345345
mp(0);


function Der($ar,$lvl,$curlvl){
	$s="";
	for($i=0;$i<($curlvl-1)*4;$i++)
		$s.=" ";
	if(is_array($ar)){
		echo "Array[".count($ar)."]\n".$s."    (\n";
		foreach($ar as $code=>$val){
			if(!is_array($val)) echo $s."    [".$code."] => ".$val."\n";
			else if($lvl==$curlvl) echo $s."    [".$code."] => Array[".count($val)."]"."\n";
			else  {echo $s."    [".$code."] => "; Der($val,$lvl,$curlvl+1);}

		}
		echo $s."    )\n";
	}
}
//$deeplvl  вложенность вывода
function mp($ar,$deeplvl=false){
	global $USER;
	//if(!$USER->IsAdmin())return;
	echo '<pre style="z-index: 15000; background-color: rgb(8, 73, 146); color: rgb(158, 210, 255); font-weight: bold; margin: 20px 15px 15px; border-radius: 15px; padding: 10px;">';
	if(!$deeplvl) echo print_r($ar,1);
	else {
		Der($ar,$deeplvl,1);
	}
	echo "</pre>";
}