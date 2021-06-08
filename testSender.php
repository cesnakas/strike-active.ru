<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
\Bitrix\Main\Loader::includeModule("sender");

   $list = array();
   foreach (\Bitrix\Sender\Subscription::getMailingList(array('IS_PUBLIC' => 'Y')) as $l) {
      $list[] = $l['ID'];
   }
   \Bitrix\Sender\Subscription::add('test22@mail.ru', $list, SITE_ID);
