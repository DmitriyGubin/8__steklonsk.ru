<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 
	// debug($arResult['SECTIONS']);
?>


<style type="text/css">
	.active_sec
	{
		/*color: #4e7144 !important;*/
	}
</style>

<ul>
<?php foreach ($arResult['SECTIONS'] as &$arSection): ?>
	<?php
	//проверяем на активность
    $is_active = strpos($_SERVER['REQUEST_URI'], $arSection['CODE']) != false;
    //проверяем на активность

	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	?>
	<li class="<?= $is_active?'active-catalog':null; ?>" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
		
		<a href="<?= $arSection['SECTION_PAGE_URL']; ?>">
			<?= $arSection['NAME']; ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>
<?php unset($arSection); ?>






















