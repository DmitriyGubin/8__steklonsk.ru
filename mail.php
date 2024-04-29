<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

//почта компании = "t89137275379@ya.ru";
//$sitename = "Стекломаркет";

if (trim($_GET["name"]) == '') 
{
	$hasError = true;
} 
else 
{
	$name = trim($_GET["name"]);
}

if (trim($_GET["phone"]) == '') 
{
	$hasError = true;
} 
else 
{
	$phone = trim($_GET["phone"]);
}

//$email = trim($_GET["email"]);
//$soobsh = trim($_GET["soobsh"]);

if (!isset($hasError)) 
{
	$date = date_create();
	date_modify($date, '4 hour');
	$date = date_format($date, 'd.m.Y H:i:s');

	$PROP = array();
	$PROP['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];
	$PROP['NAME'] = $name;
	$PROP['PHONE'] = $phone;
	$PROP['DATE'] = $date;

	if(isset($_GET["any_questions"]))
	{
		CEvent::Send("YOUR_QUESTIONS", "s1", $PROP);
	}
	elseif (isset($_GET["write_us"])) 
	{
		$PROP['EMAIL'] = trim($_GET["email"]);
		$PROP['MESSAGE'] = trim($_GET["soobsh"]);
		CEvent::Send("WRITE_US", "s1", $PROP);
	}
	elseif ($_GET["product_name"] != '')
	{
		$PROP['PRODUCT_NAME'] = $_GET["product_name"];
		CEvent::Send("CATALOG_ORDER", "s1", $PROP);
	}
	else
	{
		CEvent::Send("ONLINE_ORDER", "s1", $PROP);
	}
}


?>