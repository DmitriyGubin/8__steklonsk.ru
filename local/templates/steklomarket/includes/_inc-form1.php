<form class="form-callback" method="post" action="">
	<input type="text" required="" name="name" placeholder="Ваше имя" class="input-text" title="Укажите ваше имя (не менее двух букв)" required pattern="^[а-яА-ЯёЁa-zA-Z]{2,128}[а-яА-ЯёЁa-zA-Z\s]{0,128}$">
	<input id="customer_phone3" type="tel" value="+7(___)___-__-__" required="required" name="phone" class="input-text" pattern="\+7\(\d{3}\)\d{3}-\d{2}-\d{2}" placeholder="+7(___)___-__-__"><br><br>
	<input type="checkbox" checked="checked" required="required" disabled="disabled"> Соглашаюсь на обработку моих персональных данных
	<input type="hidden" name="any_questions" value="for_find">

	<!--div class="g-recaptcha" data-sitekey="6LeLoGkUAAAAAArh_-fQImt9nlB7crGsniHhXPtq" style="margin: 20px auto 0 auto;"></div>
	<div class="text-danger" id="recaptchaError"></div-->

	<input type="submit" value="Заявка на консультацию" class="button" onclick="ym(54686242, 'reachGoal', 'online-konsylt'); return true;">
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
var input = document.querySelector("#customer_phone3");
input.addEventListener("input", mask, false);
//input.focus();
//setCursorPosition(3, input);
});
</script>