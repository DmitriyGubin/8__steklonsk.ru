<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<?php
    $this_service = Return_All_Sections(
		Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "CODE" => $_GET['type']),
		Array("UF_SERV_IMG","UF_TITLE","UF_DESCR","UF_KEYWORDS")
	);

	//debug($this_service);

	$slides =  Return_All(
		Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "IBLOCK_SECTION_ID" => $this_service[0]['ID']),
		Array('ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE')
	);
    
	$APPLICATION->SetPageProperty("keywords", $this_service[0]['UF_KEYWORDS']);
	$APPLICATION->SetPageProperty("description", $this_service[0]['UF_DESCR']);
	$APPLICATION->SetPageProperty('title', $this_service[0]['UF_TITLE']);
?>


<h1 class="h2"><?= $this_service[0]['NAME']; ?></h1>
<div class="text">
	<?= $this_service[0]['~DESCRIPTION']; ?>
</div>

<?php if(count($slides) > 0): ?>
<div id="vnutr-carousel" class="carousel-gallery">
<?php foreach ($slides as $slide_item): ?>
	<div class="item">
		<a rel="gallery1" href="<?=\CFile::GetPath($slide_item['DETAIL_PICTURE'])?>" class="img-cont fancybox">
			<img loading="lazy" src="<?=\CFile::GetPath($slide_item['PREVIEW_PICTURE'])?>" alt="#" class="image">
		</a>
	</div>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>