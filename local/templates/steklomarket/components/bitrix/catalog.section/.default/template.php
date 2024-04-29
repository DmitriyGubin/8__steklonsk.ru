<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
//debug($arResult['ITEMS']);
 ?>

<?php if(strpos($_SERVER['REQUEST_URI'], "catalog/steklo-lacobel") != false): ?>
	<!-- <img src="<?= $arResult['ITEMS'][0]['PREVIEW_PICTURE']['SRC']; ?>" alt="#" style="margin-top: 50px; width: 100%;"> -->
<?php else: ?>
<div class="b-tovar catalog">
<?php $num_gall = 0; ?>
<?php foreach ($arResult['ITEMS'] as $arItem): ?>
<?php $num_gall++; ?>
	<div class="item">
	<div>

		<!-- <a rel="gallery2" href="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>" class="img-cont fancybox">
					<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="">
				</a> -->

		<div class="catalog-slider">
			<div class="catalog-slide">
				<a href="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>" rel="<?= 'gall'.$num_gall; ?>" class="img-box fancybox">
					<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
				</a>
			</div>
			<?php foreach ($arItem['PROPERTIES']['GALLERY']['VALUE'] as $id_img): ?>
			<?php $path = \CFile::GetPath($id_img); ?>
				<div class="catalog-slide">
					<a href="<?= $path; ?>" rel="<?= 'gall'.$num_gall; ?>" class="img-box fancybox">
						<img src="<?= $path; ?>">
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="title"><?= $arItem['NAME']; ?></div>

	<?php 
		$descr = $arItem['~PREVIEW_TEXT'];
		if($descr != '')
		{
			$descr = $descr.'.<br>';
		}

		$producer = $arItem['PROPERTIES']['PRODUCER']['VALUE'];
		if($producer != '')
		{
			$producer = 'Производство '.$producer.'.<br>';
		}

		$proportions = $arItem['PROPERTIES']['PROPORTIONS']['VALUE'];
		if($proportions != '')
		{
			$str = '';
			foreach ($proportions as $key => $value) 
			{
				$str = $str.$value.', ';
			}
			// $str[strlen($str) - 1] = '';
			// $str[strlen($str) - 2] = '.';
			$prop_result = 'Размеры листов '.$str;
		}
		else
		{
			$prop_result = '';
		}
	?>
		<div class="descr">
			<!-- Стекло Сатин (матовое, химтравление) 4 мм. Влагостойкое.<br>
			Производство AGC.<br>
			Размеры листов 2550х1605. -->
			<?= $descr; ?>
			<?= $producer; ?>
			<?= $prop_result; ?>
		</div>

		<div class="prod-price">
			<?= number_format($arItem["PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' ').' ₽'; ?>
		</div>
		</div>
		<a data-name="<?= $arItem['NAME']; ?>" class="send-order-catalog fancybox" href="#callback">
			Заказать
		</a>
	</div>
<?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Пагинация -->
<?php 
$showBottomPager = false;
if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
}
?>

<?php if($showBottomPager): ?>
	<div data-pagination-num="<?=$navParams['NavNum']?>">
		<!-- pagination-container -->
		<?=$arResult['NAV_STRING']?>
		<!-- pagination-container -->
	</div>
<?php endif; ?>
<!-- Пагинация -->

