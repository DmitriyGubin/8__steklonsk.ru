<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 
	$main_page_or_not = Check_Main_Page();
?>

<?php if(!$main_page_or_not): ?>
</div>
	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/aside.php');
	?>
</div>
<?php endif; ?>

<?php 
	$banner = Return_All(
		Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y"),
		Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_FOOTER_BANNER")
	);
?>

<style type="text/css">
	.footer 
	{
	    position: relative;
	 	background: url(<?=\CFile::GetPath($banner[0]['PROPERTY_FOOTER_BANNER_VALUE']);?>) center no-repeat;
	 	background-size: cover;
	 	padding-bottom: 40px;
	}
</style>

<footer class="footer">
	<div class="container">

		<!-- Меню -->
		<div class="top-header">

			<div id="mmenu" style="display: none;">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<a href="/" class="logo"></a>

			<div class="contacts">
				<div class="item">
					<a href="tel:<?= $phone_orders ?>" class="tel" onclick="ym(54686242, 'reachGoal', 'mob-tel1'); return true;">
						<?= Phone_Converter($phone_orders,' '); ?>
					</a>
					<p class="name">прием заказов</p>
				</div>



				<div class="item">
					<a href="tel:<?= $phone_install; ?>" class="tel" onclick="ym(54686242, 'reachGoal', 'mob-tel3'); return true;">
						<?= Phone_Converter($phone_install,' '); ?>
					</a>
					<p class="name">отдел монтажа</p>
				</div>

				<a href="https://wa.me/79139171156" target=_blank onclick="ym(54686242, 'reachGoal', 'napisat-w'); return true;">Напишите в WhatsApp</a>

			</div>
		</div>

		<?$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"main_menu",
			Array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "left",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(""),
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"ROOT_MENU_TYPE" => "main",
				"USE_EXT" => "N"
			)
		);?>
		<!-- Меню -->

		<div class="metrika">
			<!-- Yandex.Metrika informer --> <a href="https://metrika.yandex.ru/stat/?id=54686242&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/54686242/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="54686242" data-lang="ru" /></a> <!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(54686242, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/54686242" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
		</div>

	</div>
</footer>
</div>

<div class="hidden">
	<div class="modal-zakaz" id="callback">
		<h2>Онлайн-заявка</h2>

		<?php 
			//include('_inc-form2.php');
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/_inc-form2.php'); 
		?>

	</div>
	<div id="modal-thanks" class="modal-zakaz popup-uspeh">
		<h2>Спасибо!</h2>
		<p>Мы перезвоним вам в ближайшее время</p>
	</div>
</div>

<a href="" id="top" class="back-to-top"></a>

<!--
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
-->


<script src="<?= SITE_TEMPLATE_PATH.'/js/vendor.js'; ?>"></script>
<script src="<?= SITE_TEMPLATE_PATH.'/js/main.js'; ?>"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="text/javascript">
	(function($){


		$('#mmenu').click(function(){
			$('#mmenu').toggleClass('open');
			$('.nav').toggleClass('open');
		});


	})(jQuery);

/**мои добавки****/
	var send_butts = document.querySelectorAll('.send-order-catalog');
	var input_product = document.querySelector('#catalog_prod_name_popup');

	if(send_butts.length != 0)
	{
		for (let item of send_butts)
		{
			item.addEventListener('click', function(){
				input_product.value = this.dataset.name; 
			});
		}
	}

	var online_butt = document.querySelector('.nav li.color-orange');
	online_butt.addEventListener('click', function(){
		input_product.value = '';
	});
/**мои добавки****/
</script>

</body>
</html>