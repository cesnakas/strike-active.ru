<?

if (!defined('PUBLIC_AJAX_MODE')) {
    define('PUBLIC_AJAX_MODE', true);
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $APPLICATION, $USER;

switch($_REQUEST['TYPE'])
{
    case "SEND_PWD":
    {
        //Компонент с шаблоном errors выводит только ошибки
        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.form",
            "errors",
            Array(
                "REGISTER_URL" => "",
                "FORGOT_PASSWORD_URL" => "",
                "PROFILE_URL" => $_REQUEST["PROFILE_URL"],
                "SHOW_ERRORS" => $_REQUEST["SHOW_ERRORS"]
            )
        );
        $APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd","",Array());
    }
        break;

    case "REGISTRATION":
    {
        
        //Это компонент настраиваемой регистрации, либо используйте его (рекомендуется),
        //либо компонент bitrix:system.auth.registration
        $APPLICATION->IncludeComponent(
            "bitrix:main.register",
            ".default",
            Array(
                "SHOW_FIELDS" => array("EMAIL", "PERSONAL_PHONE"),
                "REQUIRED_FIELDS" => array("EMAIL", "PERSONAL_PHONE", "AGREE"),
                "AUTH" => "Y",
                "USE_BACKURL" => "Y",
                "SUCCESS_PAGE" => "",
                "SET_TITLE" => "N",
                "USER_PROPERTY" => array(),
                "USER_PROPERTY_NAME" => ""
            )
        );    
        
        if($USER->IsAuthorized())
        {
            $APPLICATION->RestartBuffer();
            $backurl = $_REQUEST["backurl"] ? $_REQUEST["backurl"] : '/';
            ?>
            <script>
                location.reload();
            </script>
        <?
        }
    }
        break;

    default:
    {
        //Вместо компонента system.auth.form можете использовать компонент system.auth.authorize,
        //но не забудьте поменять вызов компонента в HTML на аналогичный

        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.form",
            "",
            Array(
                "REGISTER_URL" => $_REQUEST["REGISTER_URL"],
                "FORGOT_PASSWORD_URL" => $_REQUEST["FORGOT_PASSWORD_URL"],
                "PROFILE_URL" => $_REQUEST["PROFILE_URL"],
                "SHOW_ERRORS" => $_REQUEST["SHOW_ERRORS"]
            )
        );


        if($USER->IsAuthorized())
        {
            $APPLICATION->RestartBuffer();
            $backurl = $_REQUEST["backurl"] ? $_REQUEST["backurl"] : '/';
            ?>
            <script>
                location.reload();
            </script>
        <?
        }
    }
}