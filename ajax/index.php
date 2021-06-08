<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

\Bitrix\Main\Loader::includeModule("main");

$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

$action = (isset($request['action'])) ? $request['action'] : null;
if ($action == null) {
    die("Action is undefined");
}

$action_name = explode("_", $action);
$className = ucfirst($action_name[0]);
$methodName = ucfirst($action_name[1]);

if (!class_exists($className)) {

    die("Class $className is undefined");
}

if (!method_exists($className, $methodName)) {
    die("Method is not exists");
}

$class = new $className($request);
$class->$methodName();