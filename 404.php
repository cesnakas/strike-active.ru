<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Not Found");

/*$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"36000000"
	)
							  );*/
?><div class="b-error-p">
	<img class="b-error-p__img" src="<?php echo SITE_TEMPLATE_PATH;?>/images/not-found-img.png" alt=""/>
	<div class="b-error-p__text">Запрашиваемая страница не найдена!</div>
	<a href="/" class="b-error-p__link">вернуться на главную</a>
</div>
<script>
$("body").addClass('error-page');
$('.b-top-menu li.current').html('<a href="/" itemprop="url"><span style="text-decoration: none;" >Главная</span></a>');
</script>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>