<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Адрес и телефон интернет магазина strike-active.ru");
$APPLICATION->SetPageProperty("description", "Контакты интернет магазина strike-active.ru");
$APPLICATION->SetTitle("Контакты");
?><script src="https://api-maps.yandex.ru/1.1/index.xml" type="text/javascript"></script>

<script type="text/javascript">
	// Создание обработчика для события window.onLoad
	YMaps.jQuery(function () {
		// Создание экземпляра карты и его привязка к созданному контейнеру
		var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
		
		// Создает объект YMaps.Zoom с пользовательскими подсказками и добавляет его на карту.
		// Коэффициенту масштабирования 1 соответствует подсказка "Мелко",
		// коэффициенту масштабирования 9 - "Средне",
		// коэффициенту масштабирования 16 - "Крупно".
		var zoom = new YMaps.Zoom({
			/*customTips: [
				{ index: 1, value: "Мелко" },
				{ index: 9, value: "Средне" },
				{ index: 16, value: "Крупно" }
			]*/
		});
		//Добавление элемента управления на карту
		map.addControl(zoom);		

		// Установка для карты ее центра и масштаба
		map.setCenter(new YMaps.GeoPoint(30.362302, 59.924961), 16);
		
		// Создание группы объектов и добавление ее на карту
		var group = new YMaps.GeoObjectCollection();
		group.add(createPlacemark(new YMaps.GeoPoint(30.362302, 59.924961), 'Санкт-Петербург', 'Лиговский пр., д. 50, к. 2'));
		//group.add(createPlacemark(new YMaps.GeoPoint(37.752293, 55.759172), 'Москва', 'ш. Энтузиастов, д. 31с38, пав. Г4 (ТЦ 31)'));
		//group.add(createPlacemark(new YMaps.GeoPoint(37.603693, 55.813455), 'Москва', 'Огородный пр-д, 10, ТЦ Зеленый'));
		//group.add(createPlacemark(new YMaps.GeoPoint(44.003714, 56.309124), 'Нижний Новгород', 'ул. Тимирязева 41'));
		//group.add(createPlacemark(new YMaps.GeoPoint(28.303668, 57.808778), 'Псков', 'ул. Генерала Маргелова, д. 9Б'));
		//group.add(createPlacemark(new YMaps.GeoPoint(73.459229, 61.233929), 'Сургут', 'ул. Югорская, д. 13, ТЦ "Мир на Югорской"'));
		//group.add(createPlacemark(new YMaps.GeoPoint(65.561403, 57.133690), 'Тюмень', 'ул. 50 лет ВЛКСМ, д. 63, 1-ая очередь, 2-ой этаж'));
		//group.add(createPlacemark(new YMaps.GeoPoint(73.375381, 55.004628), 'Омск', 'Лофт "Агрегат", ул. Герцена, д. 58, 5 этаж, каб. 320'));
		//group.add(createPlacemark(new YMaps.GeoPoint(39.067094, 45.024093), 'Краснодар', 'ул. Сормовская, д. 12Е , 3 этаж'));
		map.addOverlay(group);

		// Создание управляющего элемента "Путеводитель по офисам"
		map.addControl(new OfficeNavigator(group));	
		
	});

	// Функия создания метки
	function createPlacemark (geoPoint, name, description) {
		
		// Создает стиль
		var s = new YMaps.Style();
		// Создает стиль значка метки
		s.iconStyle = new YMaps.IconStyle();
		s.iconStyle.href = "<?php echo SITE_TEMPLATE_PATH;?>/images/marker.png";
		s.iconStyle.size = new YMaps.Point(29, 41);
		s.iconStyle.offset = new YMaps.Point(-15, -42);		
		
		var placemark = new YMaps.Placemark(geoPoint, {style: s});
		placemark.name = name;
		placemark.description = description;
		return placemark;
	}

	// Управляющий элемент "Путеводитель по офисам", реализиует интерфейс YMaps.IControl
	function OfficeNavigator (offices) {

		// Добавление на карту
		this.onAddToMap = function (map, position) {
				this.container = YMaps.jQuery("<ul></ul>")
				this.map = map;
				this.position = position || new YMaps.ControlPosition(YMaps.ControlPosition.TOP_RIGHT, new YMaps.Size(10, 10));

				// Выставление необходимых CSS-свойств
				this.container.css({
					position: "absolute",
					zIndex: YMaps.ZIndex.CONTROL,
					background: '#fff',
					listStyle: 'none',
					padding: '10px',
					margin: 0
				});
				
				// Формирование списка офисов
				this._generateList();
				
				// Применение позиции к управляющему элементу
				this.position.apply(this.container);
				
				// Добавление на карту
				this.container.appendTo(this.map.getContainer());
		}

		// Удаление с карты
		this.onRemoveFromMap = function () {
			this.container.remove();
			this.container = this.map = null;
		};

		// Пока "летим" игнорируем клики по ссылкам
		this.isFlying = 0;

		// Формирование списка офисов
		this._generateList = function () {
			var _this = this;
			
			// Для каждого объекта вызываем функцию-обработчик
			offices.forEach(function (obj) {
				// Создание ссылок на объект
				var li = YMaps.jQuery("<li><a href=\"#\">" + obj.name + "</a></li>");
				var li2 = YMaps.jQuery("[data="+ obj.name +"]");
				var a = li.find("a");
				var a2 = li2.find("a");
				
				// Создание обработчиков щелчка по ссылкам
				li.bind("click", function () {
					if (!_this.isFlying) {
						_this.isFlying = 1;
						_this.map.panTo(obj.getGeoPoint(), {
							flying: 1,
							callback: function () {
								obj.openBalloon();
								_this.isFlying = 0;
							}
						});
					}
					return false;
				});
				li2.bind("click", function () {
					if (!_this.isFlying) {
						_this.isFlying = 1;
						_this.map.panTo(obj.getGeoPoint(), {
							flying: 1,
							callback: function () {
								obj.openBalloon();
								_this.isFlying = 0;
							}
						});
					}
					return false;
				});				
				
				// Слушатели событий на открытие и закрытие балуна у объекта
				YMaps.Events.observe(obj, obj.Events.BalloonOpen, function () {
					a.css("text-decoration", "none");
					a2.css("text-decoration", "none");
				});
				
				YMaps.Events.observe(obj, obj.Events.BalloonClose, function () {
					a.css("text-decoration", "");
					a2.css("text-decoration", "");
				});
				
				// Добавление ссылки на объект в общий список
				li.appendTo(_this.container);
			});
		};
	}
</script>



<div class="b-contacts">
	<div class="b-contacts__left b-contacts__part">

		<? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_TEMPLATE_PATH . "/includes/pages/contacts.php",
			)
		); ?>


	</div>

	<div class="b-contacts__part">
		<!--<div class="b-contacts__map">
			<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
			<script>
				var myMap;
				ymaps.ready(init);
				function init() {
					myMap = new ymaps.Map('contactmap', {
						center: [59.924961,30.362302], // СПб
						zoom: 14,
						controls: ['smallMapDefaultSet'],
						scrollZoom: false
					});
					myMap.behaviors.disable("scrollZoom");
					myPlacemark = new ymaps.Placemark([59.924961,30.362302], {}, {
						iconLayout: 'default#image',
						// Своё изображение иконки метки.
						iconImageHref: "<?php //echo SITE_TEMPLATE_PATH;?>/images/marker.png",
						// Размеры метки.
						iconImageSize: [29, 41],
						iconImageOffset: [-15, -42]
					});
					myMap.geoObjects.add(myPlacemark);
				}
			</script>
			<div class="b-contacts__map-wrapper" id="contactmap" style="height:300px;">

			</div>
		</div>-->
		<div class="b-contacts__map">
			<div class="b-contacts__map-wrapper" id="YMapsID" style="height:800px;">

			</div>
		</div>		

</div>
<? $APPLICATION->IncludeComponent("bitrix:form.result.new", "contact", Array(
			"SEF_MODE" => "N",    // Включить поддержку ЧПУ
			"WEB_FORM_ID" => "1",    // ID веб-формы
			"LIST_URL" => "",    // Страница со списком результатов
			"EDIT_URL" => "",    // Страница редактирования результата
			"SUCCESS_URL" => "",    // Страница с сообщением об успешной отправке
			"CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
			"CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
			"IGNORE_CUSTOM_TEMPLATE" => "Y",    // Игнорировать свой шаблон
			"USE_EXTENDED_ERRORS" => "Y",    // Использовать расширенный вывод сообщений об ошибках
			"CACHE_TYPE" => "A",    // Тип кеширования
			"CACHE_TIME" => "3600",    // Время кеширования (сек.)
			"AJAX_MODE" => "Y",  // режим AJAX
			"AJAX_OPTION_SHADOW" => "N", // затемнять область
			"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
			"AJAX_OPTION_STYLE" => "Y", // подключать стили
			"AJAX_OPTION_HISTORY" => "N",
		),
			false
		); ?>

</div>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Store",
  "image": [
    "https://strike-active.ru/upload/iblock/701/70175b26005398f6ff4e5eba56884fb3.jpeg",
    "https://strike-active.ru/upload/iblock/003/00389e0da9749fea941a3426b399e8fb.jpg",
    "https://strike-active.ru/upload/iblock/9c4/9c444461185254791231824ef3b7f764.jpg"
   ],
  "@id": "https://strike-active.ru/",
  "name": "Strike Active",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "ЛИГОВСКИЙ ПР., Д. 50, КОРП. 2",
    "addressLocality": "Г. САНКТ-ПЕТЕРБУРГ",
    "addressRegion": "Ленинградская обл.",
    "postalCode": "191040",
    "addressCountry": "РФ"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 59.925259, 
    "longitude": 30.358251
  },
  "url": "https://strike-active.ru/",
  "telephone": "+88005501658",
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday"
      ],
      "opens": "11:30",
      "closes": "20:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Wednesday",
        "Thursday",
        "Friday"
      ],
      "opens": "11:00",
      "closes": "20:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Saturday",
      "opens": "10:00",
      "closes": "19:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Sunday",
      "opens": "10:00",
      "closes": "19:00"
    }
  ]
}
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>