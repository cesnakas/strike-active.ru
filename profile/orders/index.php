<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мои заказы");

global $USER;
if(!$USER->IsAuthorized()){
    LocalRedirect("/");
}
?><?$APPLICATION->IncludeComponent("bitrix:sale.personal.order.list", "orders", Array(
	"STATUS_COLOR_N" => "green",	// Цвет статуса "Принят, ожидается оплата"
		"STATUS_COLOR_P" => "yellow",
		"STATUS_COLOR_F" => "gray",	// Цвет статуса "Выполнен"
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red",	// Цвет отменённых заказов
		"PATH_TO_DETAIL" => "/profile/orders/detail/?ID=#ID#",	// Страница c подробной информацией о заказе
		"PATH_TO_COPY" => "/basket/",	// Страница повторения заказа
		"PATH_TO_CANCEL" => "/profile/orders/cancel/?ID=#ID#",	// Страница отмены заказа
		"PATH_TO_BASKET" => "/basket/",	// Страница корзины
		"PATH_TO_PAYMENT" => "/payment/",	// Страница подключения платежной системы
		"ORDERS_PER_PAGE" => "20",	// Количество заказов, выводимых на страницу
		"ID" => $_REQUEST["ID"],	// Идентификатор заказа
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SAVE_IN_SESSION" => "Y",	// Сохранять установки фильтра в сессии пользователя
		"NAV_TEMPLATE" => ".default",	// Имя шаблона для постраничной навигации
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"HISTORIC_STATUSES" => "F",	// Перенести в историю заказы в статусах
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"COMPONENT_TEMPLATE" => ".default",
		"PATH_TO_CATALOG" => "/category/",	// Путь к каталогу
		"RESTRICT_CHANGE_PAYSYSTEM" => array(	// Запретить смену платежной системы у заказов в статусах
			0 => "0",
		),
		"DEFAULT_SORT" => "DATE_INSERT",	// Сортировка заказов
		"ALLOW_INNER" => "N",	// Разрешить оплату с внутреннего счета
		"ONLY_INNER_FULL" => "N",	// Разрешить оплату с внутреннего счета только в полном объеме
		"STATUS_COLOR_NN" => "gray"
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>