<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$APPLICATION->SetPageProperty("keywords", $arResult['PROPERTIES']['ARTICLE_KEYWORDS']['VALUE']);
$APPLICATION->SetPageProperty("description", $arResult['PROPERTIES']['ARTICLE_DESCRIPTION']['VALUE']);
$APPLICATION->SetPageProperty('title', $arResult['NAME'].' / Компания Стекломаркет / г. Новосибирск');
//debug($arResult);
?>



<p class="breadcrump">
	<a href="/">Главная</a> / <a href="/articles/">Статьи</a> / <?= $arResult['NAME']; ?>
</p>

<h1 class="h2"><?= $arResult['NAME']; ?></h1>
<div class="text">
	<?= $arResult['~DETAIL_TEXT']; ?>
	<p><a href="javascript:history.back();" class="historyback">← Вернуться назад</a></p>
</div>


