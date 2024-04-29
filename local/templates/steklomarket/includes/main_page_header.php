<?php 
	$inserts = Return_All_Fields_Props(
		Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y"),
		Array()
	);

	$services = Return_All_Sections(
		Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "UF_SHOM_TOP_BANNER" => '1'),
		Array("UF_SHOM_TOP_BANNER")
	);
?>

<div class="container">
	<h1 style="display: none !important;">Компания Стекломаркет, г. Новосибирск</h1>
	<h2 class="sect-title">Резка и обработка<br>всех видов стекла и зеркал</h2>
	<div class="yellow-line">Индивидуальный подход к каждому клиенту</div>
	<div class="bottom-line">
	<?php foreach ($inserts[0]['props']['ADVANTAGES']['VALUE'] as $key => $value): ?>
		<div class="item" style="background: 
		url(<?= \CFile::GetPath($value); ?>) center 23px no-repeat,
		url(<?= SITE_TEMPLATE_PATH.'/img/s1-item-bg.png'; ?>) center 0 no-repeat;">
			<p class="text"><?= $inserts[0]['props']['ADVANTAGES']['~DESCRIPTION'][$key]; ?></p>
		</div>
	<?php endforeach; ?>
	</div>

	<div class="almazniy-stol">
		<img src="<?= \CFile::GetPath($inserts[0]['props']['MACHINE_PHOTO']['VALUE']); ?>">
		<?php foreach ($services as $serv_item): ?>
			<a href="<?= $serv_item['SECTION_PAGE_URL']; ?>"><?= $serv_item['NAME']; ?></a>
		<?php endforeach; ?>	
	</div>
</div>