<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<style type="text/css">
	.active_menu_main
	{
		/*color: #ffcc66 !important;*/
	}
</style>

<?if (!empty($arResult)):?>

<nav class="nav">
	<ul>
		<?foreach($arResult as $arItem): ?>
		<li>
			<a class="<?= $arItem["SELECTED"]?'active_menu_main':null; ?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
		</li>
		<?endforeach?>
		<li class="color-orange"><a class="fancybox" href="#callback">онлайн-заявка</a></li>
	</ul>
</nav>

<?endif?>

















