<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php use Bitrix\Main\Page\Asset; ?>

<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/little_api.php');
		$main_page_or_not = Check_Main_Page();

		$contacts = Return_All(
			Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y"),
			Array("ID", "IBLOCK_ID", "NAME", 
				"PROPERTY_PHONE_ORDERS",
				"PROPERTY_PHONE_INSTALL",
				"PROPERTY_WATS_APP",
				"PROPERTY_ADDRESS",
				"PROPERTY_COORD_X",
				"PROPERTY_COORD_Y",
				"PROPERTY_MAP_LABEL",
				"PROPERTY_EMAIL",
			)
		);

		$phone_orders = $contacts[0]['PROPERTY_PHONE_ORDERS_VALUE'];
		$phone_install = $contacts[0]['PROPERTY_PHONE_INSTALL_VALUE'];
		//$GLOBALS['all_contacts'] = $contacts;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?php $APPLICATION->ShowHead() ?>
	<!-- <meta charset="utf-8"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <title>Компания Стекломаркет / г. Новосибирск - Главная</title> -->
	<title><?php $APPLICATION->ShowTitle() ?></title>
	<?php
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/vendor.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/main.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/main-media.css');
        // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/main.js');

        Asset::getInstance()->addString('<meta name="viewport" content="width=device-width">');
        Asset::getInstance()->addString("<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,900|Roboto+Condensed:400,300,700|PT+Sans:400,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>");
    ?>
	
	<meta name="MobileOptimized" content="width">
	<meta name="HandheldFriendly" content="true">
	<!-- <script src="//code.jivo.ru/widget/Tzz96ImrDr" async></script> -->
	<?php if($main_page_or_not): ?>
		<!-- <meta name="og:description" content="Полированное стекло - изготавливается по системе флоат, является высококачественным прозрачным стеклом с плоскопараллельными поверхностями и применяет..." /> -->
	<?php endif; ?>

	<!-- Микроразметка Open Graph -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://steklonsk.ru">
	<meta property="og:title" content="Компания Стекломаркет">
	<meta property="og:description" content="Полированное стекло - изготавливается по системе флоат, является высококачественным прозрачным стеклом с плоскопараллельными поверхностями и применяет...">
	<meta property="og:image" content="https://steklonsk.ru/favicon.ico">
	<!-- Микроразметка Open Graph -->
</head>

<body>

<!-- Микроразметка Schema.org -->
<div itemscope itemtype="http://schema.org/Organization">
	<meta itemprop="name" content="Компания Стекломаркет">
	<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<meta itemprop="streetAddress" content="Овчукова 71">
		<meta itemprop="postalCode" content="630110">
		<meta itemprop="addressLocality" content="Новосибирск">
	 </div>
	 <meta itemprop="telephone" content="+7 383 299-11-56">
	 <meta itemprop="email" content="2991156@steklonsk.ru">
</div>
<!-- Микроразметка Schema.org -->

	<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
	<div id="<?= $main_page_or_not ? 'str-glavnaya' : 'str-vnutr'; ?>">
		<header class="header">
			<div class="container">
				<!-- Меню -->
				<div class="top-header">

					<div id="mmenu" style="display: none;">
						<span></span>
						<span></span>
						<span></span>
					</div>

					<a href="/" class="logo"></a>

					<div class="contacts">
						<div class="item">
							<a href="tel:<?= $phone_orders ?>" class="tel" onclick="ym(54686242, 'reachGoal', 'mob-tel1'); return true;">
								<?= Phone_Converter($phone_orders,' '); ?>
							</a>
							<p class="name">прием заказов</p>
						</div>

						<div class="item">
							<a href="tel:<?= $phone_install ?>" class="tel" onclick="ym(54686242, 'reachGoal', 'mob-tel3'); return true;">
								<?= Phone_Converter($phone_install,' '); ?>
							</a>
							<p class="name">отдел монтажа</p>
						</div>

						<a href="https://wa.me/<?= $contacts[0]['PROPERTY_WATS_APP_VALUE'] ?>" target=_blank onclick="ym(54686242, 'reachGoal', 'napisat-w'); return true;">
							Напишите в WhatsApp
						</a>

					</div>
				</div>

				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"main_menu",
					Array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"DELAY" => "N",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(""),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "main",
						"USE_EXT" => "N"
					)
				);?>
				<!-- Меню -->
			</div>
		</header>

		<?php 
			$inserts = Return_All(
				Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y"),
				Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_MAIN_PAGE_TOP_BANNER", "PROPERTY_HEADER_BANNER")
			);
		?>

		<style type="text/css">
			#str-glavnaya .sect1 {
			    background: url(<?= \CFile::GetPath($inserts[0]['PROPERTY_MAIN_PAGE_TOP_BANNER_VALUE']); ?>) center no-repeat fixed;
			    background-size: cover;
			    position: relative;
			    padding: 240px 0 130px 0;
			}

			#str-vnutr .sect1 {
			    background: url(<?= \CFile::GetPath($inserts[0]['PROPERTY_HEADER_BANNER_VALUE']); ?>) center 0 no-repeat;
			    background-size: 100% auto;
			    height: 234px;
			}

			@media only screen and (max-width: 750px) 
			{
				 #str-glavnaya .sect1 {padding-top: 120px;}
			}

			@media only screen and (max-width: 540px)
			{
				#str-glavnaya .sect1 {padding-bottom: 20px;}
			}

			@media only screen and (max-width: 670px) 
			{
				 #str-vnutr .sect1 {height: 110px;}
			}
		</style>

		<section class="sect1">
			<?php 
				if($main_page_or_not)
				{
					require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/main_page_header.php');
				} 
			?>
		</section>
<?php if(!$main_page_or_not): ?>
	<div class="container">
		<div class="main-section">

<?php endif; ?>