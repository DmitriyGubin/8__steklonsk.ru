<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "Заказать монтаж стекла и зеркал в Новосибирске, Компания Стекломаркет / г. Новосибирск");
$APPLICATION->SetPageProperty("title", "Компания Стекломаркет / г. Новосибирск");
$APPLICATION->SetPageProperty("keywords", "Заказать монтаж стекла и зеркал в Новосибирске, Компания Стекломаркет / г. Новосибирск");
$APPLICATION->SetPageProperty("description", "Заказать монтаж стекла и зеркал в Новосибирске, Компания Стекломаркет / г. Новосибирск");
$APPLICATION->SetTitle("Компания Стекломаркет / г. Новосибирск");
?>

<?php 
	$inserts = Return_All(
		Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y"),
		Array("ID", "IBLOCK_ID", "NAME", "DETAIL_TEXT")
	);
?>

<h1 class="h2">О компании</h1>

<div class="text">
	<?= $inserts[0]['~DETAIL_TEXT']; ?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>