<aside class="aside">
	<div class="menu">
		<div class="title">Каталог</div>
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"services", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "PRODUCT_CATALOG",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "TEXT",
		"COMPONENT_TEMPLATE" => "services",
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N"
	),
	false
);?>
		<!-- <ul>
			<li><a href="/steklo-bestsvetnoe.php">Стекло беcцветное</a></li>
			<li><a href="/steklo-matovoe.php">Стекло матовое</a></li>
			<li><a href="/steklo-tonirovannoe.php">Стекло тонированное</a></li>
			<li><a href="/steklo-reflenoe.php">Стекло рифленое</a></li>
			<li><a href="/steklo-armirovannoe.php">Стекло армированное</a></li>
			<li><a href="/steklo-zharoprochnoe.php">Стекло жаропрочное</a></li>
			<li><a href="/steklo-lacobel.php">Стекло "Lacobel"</a></li>
			<li><a href="/steklo-matelak.php">Стекло "Мателак"</a></li>
			<li><a href="/zerkalo.php">Зеркало</a></li>
		</ul> -->
	</div>

	<?php if(!Check_Page('catalog/')): ?>
	<div class="menu style-orange">
		<div class="title">Услуги</div>
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"cat_services", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "ALL_CONTENT",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "UF_SERV_IMG",
			2 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "TEXT",
		"COMPONENT_TEMPLATE" => "cat_services",
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N"
	),
	false
);?>
	</div>
	<?php endif; ?>
</aside>