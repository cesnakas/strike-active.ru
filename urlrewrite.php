<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/acrit.exportproplus/(.*)#',
    'RULE' => 'path=$1',
    'ID' => NULL,
    'PATH' => '/acrit.exportproplus/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/acrit.exportpro/(.*)#',
    'RULE' => 'path=$1',
    'ID' => '',
    'PATH' => '/acrit.exportpro/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/special_offers/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/special_offers/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/profile/orders/#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/profile/orders/detail/index.php',
    'SORT' => 100,
  ),
  18 => 
  array (
    'CONDITION' => '#^/category/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/category/index.php',
    'SORT' => 100,
  ),
  17 => 
  array (
    'CONDITION' => '#^/brands/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/brands/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  14 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);
