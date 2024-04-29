<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

//debug($arResult["ITEMS"]);

?>

<div class="text">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="b-articles__item">
		<div class="b-article">
			<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="b-article__title">
				<?= $arItem['NAME']; ?>
			</a>
			<div class="b-article__text">
				<?= $arItem['~PREVIEW_TEXT']; ?> 
				<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="b-article__link">Подробнее...</a>
			</div>
		</div>
	</div>
<? endforeach; ?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>













