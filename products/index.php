<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
$APPLICATION->SetPageProperty("keywords", "Заказать монтаж стекла и зеркал в Новосибирске, Компания Стекломаркет / г. Новосибирск");
$APPLICATION->SetPageProperty("description", "Заказать монтаж стекла и зеркал в Новосибирске, Компания Стекломаркет / г. Новосибирск");

/*редирект*/
$this_url = $_SERVER['REQUEST_URI'];
if($this_url == '/products/')
{
	header('Location: /products/?type=zerkalo');
}
/*редирект*/

$section_code = $_GET['type'];

$this_section = Return_All_Sections(
		Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", "CODE" => $section_code),
		Array("UF_FOR_SLIDER","UF_TITLE_CATALOG")
	);

$sec_id = $this_section[0]['ID'];

$slider_section_id = $this_section[0]['UF_FOR_SLIDER'];

$slides = Return_All(
		Array("IBLOCK_ID"=>7, "ACTIVE"=>"Y", "IBLOCK_SECTION_ID" => $slider_section_id),
		Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE")
	);

$APPLICATION->SetPageProperty('title', $this_section[0]['UF_TITLE_CATALOG']);
?>

<h1 class="h2"><?= $this_section[0]['NAME']; ?></h1>
<div class="text">
	<?= $this_section[0]['~DESCRIPTION']; ?>
</div>

<div id="vnutr-carousel" class="carousel-gallery">
<?php foreach ($slides as $slide_item): ?>
	<div class="item">
		<a rel="gallery1" href="<?= \CFile::GetPath($slide_item['DETAIL_PICTURE']); ?>" class="img-cont fancybox">
			<img loading="lazy" src="<?= \CFile::GetPath($slide_item['PREVIEW_PICTURE']); ?>" alt="" class="image">
		</a>
	</div>
<?php endforeach; ?>
</div>

<?php 
	$products = Return_All_Fields_Props(
		Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", 'IBLOCK_SECTION_ID'=>$sec_id),
		Array()
	);
	//debug($products);
?>

<?php if(strpos($_SERVER['REQUEST_URI'], "products/?type=steklo-lacobel") != false): ?>
	<img src="<?= SITE_TEMPLATE_PATH.'/img/cobel.jpg'; ?>" alt="#" style="margin-top: 50px; width: 100%;">
<?php else: ?>
<div class="b-tovar">
<?php foreach ($products as $prod_item): ?>
	<div class="item">
		<a rel="gallery2" href="<?= CFile::GetPath($prod_item['fields']['DETAIL_PICTURE']); ?>" class="img-cont fancybox">
			<img src="<?= CFile::GetPath($prod_item['fields']['PREVIEW_PICTURE']); ?>" alt="">
		</a>
		<div class="title"><?= $prod_item['fields']['NAME']; ?></div>

	<?php 
		$descr = $prod_item['fields']['~PREVIEW_TEXT'];
		if($descr != '')
		{
			$descr = $descr.'.<br>';
		}

		$producer = $prod_item['props']['PRODUCER']['VALUE'];
		if($producer != '')
		{
			$producer = 'Производство '.$producer.'.<br>';
		}

		$proportions = $prod_item['props']['PROPORTIONS']['VALUE'];
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
	</div>
<?php endforeach; ?>
</div>
<?php endif; ?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>