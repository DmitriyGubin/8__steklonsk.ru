<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// $APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty('title', "Контакты / Компания Стекломаркет / г. Новосибирск");
$APPLICATION->SetPageProperty("keywords", "Заказать монтаж стекла и зеркал в Новосибирске, Компания Стекломаркет / г. Новосибирск");
$APPLICATION->SetPageProperty("description", "Заказать монтаж стекла и зеркал в Новосибирске, Компания Стекломаркет / г. Новосибирск");
?>

<div id="x-coord" style="display: none;"><?= $contacts[0]['PROPERTY_COORD_X_VALUE']; ?></div>
<div id="y-coord" style="display: none;"><?= $contacts[0]['PROPERTY_COORD_Y_VALUE']; ?></div>
<div id="map-label" style="display: none;"><?= $contacts[0]['PROPERTY_MAP_LABEL_VALUE']; ?></div>


<h1 class="h2">Контакты</h1>

<div class="b-contacts">
	<p class="b-contacts__line"><b>ООО СТЕКЛОМАРКЕТ</b> находится по адресу:</p>
	<p class="b-contacts__line">
		<?= $contacts[0]['PROPERTY_ADDRESS_VALUE']; ?>
	</p>

	<p class="b-contacts__line">
		<?= substr(Phone_Converter($phone_orders,'-'), 1); ?> – прием заказов
	</p>
	<p class="b-contacts__line">
		<?= substr(Phone_Converter($phone_install,'-'), 1); ?> – отдел монтажа
	</p>

	<?php $email = $contacts[0]['PROPERTY_EMAIL_VALUE']; ?>

	<p class="b-contacts__line">
		<a href="mailto:<?= $email; ?>" class="b-contacts__link">
			<?= $email; ?>
		</a>
	</p>

	<p class="b-contacts__line">
		<a href="https://wa.me/<?= $contacts[0]['PROPERTY_WATS_APP_VALUE']; ?>" target=_blank class="b-contacts__link">
			Напишите в WhatsApp
		</a>
	</p>
</div>

<div class="b-contact-form">
	<div class="modal-zakaz" style="padding: 0;">
		<div class="title" style="margin: 10px 0;">Напишите нам</div>
		<form class="form-callback" method="post" action="" style="margin: 0;">
			<input type="text" title="Укажите ваше имя (не менее двух букв)" required="" name="name" placeholder="Ваше имя" class="input-text" required pattern="^[а-яА-ЯёЁa-zA-Z]{2,128}[а-яА-ЯёЁa-zA-Z\s]{0,128}$"><br>
			<input id="customer_phone" type="tel" autofocus="autofocus" value="+7(___)___-__-__" required="required" name="phone" class="input-text" pattern="\+7\(\d{3}\)\d{3}-\d{2}-\d{2}" placeholder="+7(___)___-__-__"><br>
			<input type="text" required="" name="email" placeholder="Ваш E-mail" class="input-text" required pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})"><br>
			<textarea cols="50" rows="5" style="height: 100px;" required="required" name="soobsh" placeholder="Ваше сообщение"></textarea><br><br>
			<input type="checkbox" checked="checked" required="required" disabled="disabled"> Соглашаюсь на обработку моих персональных данных
			<input type="hidden" name="write_us" value="for_find">

	<!--div class="g-recaptcha" data-sitekey="6LeLoGkUAAAAAArh_-fQImt9nlB7crGsniHhXPtq" style="margin: 20px auto 0 auto;"></div>
		<div class="text-danger" id="recaptchaError"></div-->

			<input type="submit" value="Отправить" class="button">
		</form>
		<script type="text/javascript">
			function setCursorPosition(pos, e) {
				e.focus();
				if (e.setSelectionRange) e.setSelectionRange(pos, pos);
				else if (e.createTextRange) {
					var range = e.createTextRange();
					range.collapse(true);
					range.moveEnd("character", pos);
					range.moveStart("character", pos);
					range.select()
				}
			}

			function mask(e) {
//console.log('mask',e);
var matrix = this.placeholder,// .defaultValue
i = 0,
def = matrix.replace(/\D/g, ""),
val = this.value.replace(/\D/g, "");
def.length >= val.length && (val = def);
matrix = matrix.replace(/[_\d]/g, function(a) {
	return val.charAt(i++) || "_"
});
this.value = matrix;
i = matrix.lastIndexOf(val.substr(-1));
i < matrix.length && matrix != this.placeholder ? i++ : i = matrix.indexOf("_");
setCursorPosition(i, this)
}
window.addEventListener("DOMContentLoaded", function() {
	var input = document.querySelector("#customer_phone");
	input.addEventListener("input", mask, false);
	input.focus();
	setCursorPosition(3, input);
});
</script>
</div>

</div>

<div id="this-map" class="yandex-karta">
	<!-- <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A95df12f4202a125d010867006fb82e9f8d5961bf81495f00480fd9c5bfc243ab&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script> -->
</div>

<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=2750cb15-81ed-4ea8-a8d2-e1e7c2d7e5e2&amp;lang=ru_RU"></script>
<script type="text/javascript" src="map.js"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>