<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Полированное стекло - изготавливается по системе флоат, является высококачественным прозрачным стеклом с плоскопараллельными поверхностями и применяет...");
$APPLICATION->SetTitle("Компания Стекломаркет / г. Новосибирск - Главная");

/*рекапча проверить*/
require_once 'recaptcha/autoload.php';
 
$secret = '6LeLoGkUAAAAANkVsbmY_Pvxp5PKrCiXv5Lx2nSL'; // Вставляем сюда секретный ключ
$remoteIp = $_SERVER['REMOTE_ADDR'];
$gRecaptchaResponse = $_POST['g-recaptcha-response'];
$success = $fail = '';

if ( !empty( $_POST ) ) {
    $recaptcha = new \ReCaptcha\ReCaptcha( $secret );
    $resp = $recaptcha -> verify( $gRecaptchaResponse, $remoteIp );
    if ( $resp -> isSuccess() ) {
        // Проверка успешно пройдена
        $success = 'Форма успешно отправлена, спасибо!';
    } else {
        // Ошибка
        $fail = 'Ошибка отправки формы: ';
        $errors = $resp -> getErrorCodes();
        foreach ( $errors as $error ) {
            $fail .= $error . '; ';
        }
    }
}
/*рекапча проверить*/

?>

<?php 
	$inserts = Return_All_Fields_Props(
		Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y"),
		Array()
	);
?>

<style type="text/css">
	#str-glavnaya .sect2 
	{
	    display: table;
	    background: url(<?= \CFile::GetPath($inserts[0]['props']['ABOUT_BANNER']['VALUE']); ?>) center no-repeat;
	    width: 100%;
	    max-width: 1463px;
	    height: 479px;
	    margin: 70px auto;
	    padding-top: 65px;
	}

	@media only screen and (max-width: 1000px)
	{
		#str-glavnaya .sect2 
		{
	        background: #f2f0f1;
	        padding-top: 40px;
	        padding-bottom: 50px;
	        height: auto;
	        margin-bottom: 20px;
	    }
	}
</style>

<section class="sect2">
	<div class="container">
		<h2 class="sect-title">О компании</h2>
		<div class="main-text">
			<?= $inserts[0]['fields']['~PREVIEW_TEXT']; ?>
			<a href="/about/" class="bottom-link">подробнее</a>
		</div>
	</div>
</section>

<?php 
	$catalog = Return_All_Sections(
		Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y"),
		Array('ID','NAME', 'PICTURE', 'SECTION_PAGE_URL')
	);
?>

<section class="sect3">
	<div class="container">
		<h2 class="sect-title">Каталог продукции</h2>
		<div class="row">
		<?php foreach ($catalog as $cat_item): ?>
			<a href="<?= $cat_item['SECTION_PAGE_URL']; ?>" class="item">
				<img src="<?=\CFile::GetPath($cat_item['PICTURE']);?>" class="image">
				<p class="text"><?= $cat_item['NAME']; ?></p>
			</a>
		<?php endforeach; ?>
		</div>
	</div>
</section>

<?php 
	$services = Return_All_Sections(
		Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "UF_SHOW_MAIN_PAGE" => '1'),
		Array("UF_SHOW_MAIN_PAGE","UF_NAME_MAIN_PAGE")
	);
?>

<style type="text/css">
	#str-glavnaya .sect4     
	{
	 	background: url(<?= \CFile::GetPath($inserts[0]['props']['SERVICES_BANNER']['VALUE']); ?>) center no-repeat;
	 	background-size: cover;
	 	padding: 80px 0 20px;
	}

	#str-glavnaya .sect5 
	{
	 	background: url(<?= \CFile::GetPath($inserts[0]['props']['MAIN_PAGE_ARTICLES_BANNER']['VALUE']); ?>) center no-repeat fixed;
	 	background-size: cover;
	 	padding: 80px 0 0;
	 	overflow-x: hidden;
	}

	@media only screen and (max-width: 1250px) 
	{
	    #str-glavnaya .sect4 {background-position: -160px bottom;}
	}

	@media only screen and (max-width: 1090px) 
	{
	    #str-glavnaya .sect4 {background-position: -260px bottom;}
	}

	@media only screen and (max-width: 880px)
	{
		#str-glavnaya .sect4 {background-position: center;}
	}

	
</style>

<section class="sect4">
	<div class="container">
		<h2 class="sect-title">Услуги компании</h2>
		<div class="row">
		<?php foreach ($services as $service_item): ?>
			<a href="<?= $service_item['SECTION_PAGE_URL']; ?>">
				<div class="item"><p><?= $service_item['~UF_NAME_MAIN_PAGE']; ?></p></div>
			</a>
		<?php endforeach; ?>
		</div>
	</div>
</section>

<?php 
	$articles = Return_All(
		Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y", "PROPERTY_SHOW_MAIN_PAGE_VALUE" => 'YES'),
		Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PREVIEW_MAIN_PAGE", "DETAIL_PAGE_URL")
	);
?>

<section class="sect5">
	<div class="container">
		<h2 class="sect-title">Полезные статьи</h2>
		<div class="row">
		<?php foreach ($articles as $article_item): ?>
			<div class="item">
				<a href="<?= $article_item['DETAIL_PAGE_URL']; ?>" class="title"><?= $article_item['NAME']; ?></a>
				<div class="text">
					<?= $article_item['~PROPERTY_PREVIEW_MAIN_PAGE_VALUE']['TEXT']; ?>
				</div>
				<a href="<?= $article_item['DETAIL_PAGE_URL']; ?>" class="button">Подробнее...</a>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>

<style type="text/css">
	#str-glavnaya .sect7   
	{
	 	background: url(<?= \CFile::GetPath($inserts[0]['props']['QUESTIONS_BANNER']['VALUE']); ?>) center no-repeat;
	 	background-size: cover;
	    padding: 60px 0;
	}
</style>

<section class="sect7">
	<div class="container">
		<h2 class="sect-title">Остались вопросы?</h2>
		<div class="sub-title">Оставьте заявку и наш менеджер вам ответит</div>

		<?php
			// include('_inc-form1.php');
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/_inc-form1.php'); 
		?>

	</div>
</section>

<div id="x-coord" style="display: none;"><?= $contacts[0]['PROPERTY_COORD_X_VALUE']; ?></div>
<div id="y-coord" style="display: none;"><?= $contacts[0]['PROPERTY_COORD_Y_VALUE']; ?></div>
<div id="map-label" style="display: none;"><?= $contacts[0]['PROPERTY_MAP_LABEL_VALUE']; ?></div>

<div class="sect-map">
	<!-- <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A95df12f4202a125d010867006fb82e9f8d5961bf81495f00480fd9c5bfc243ab&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script> -->
	<div id="this-map"></div>

	<div class="white-box">
		<a href="/" class="logo"></a>
		<div class="text">
			<p><?= $contacts[0]['PROPERTY_ADDRESS_VALUE']; ?></p>
			<p>
				<a href="tel:<?= $phone_orders ?>">
					<?= substr(Phone_Converter($phone_orders,'-'), 1); ?>
				</a> - прием заказов
			</p>

			<p>
				<a href="tel:<?= $phone_install ?>">
					<?= substr(Phone_Converter($phone_install,'-'), 1); ?>
				</a> - отдел монтажа
			</p>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=2750cb15-81ed-4ea8-a8d2-e1e7c2d7e5e2&amp;lang=ru_RU"></script>
<script src="<?= SITE_TEMPLATE_PATH.'/js/map.js'; ?>"></script>

</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>