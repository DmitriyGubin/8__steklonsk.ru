<?php

function Check_Main_Page()
{
	$this_url = $_SERVER['REQUEST_URI'];
	$one_var = ($this_url[0] == '/') && ($this_url[1] == '');
	$two_var = ($this_url[0] == '/') && ($this_url[1] == '?');
	$bool = $one_var || $two_var;
	return $bool;
}

function Return_All($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockElement::GetList(
	            Array(), //сортировка данных
	            $Filter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            $Select
	        );

		$result = [];
		while($ob = $res->GetNextElement())
		{
			$result[] = $ob->GetFields();
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Return_All_Fields_Props($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockElement::GetList(
	            Array(), //сортировка данных
	            $Filter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            $Select
	        );

		$result = [];
		$j=0;
		while($ob = $res->GetNextElement())
		{
			$result[$j]['fields'] = $ob->GetFields();
			$result[$j]['props'] = $ob->GetProperties();
			$j++;
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Return_All_Sections($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockSection::GetList(
                Array(),
                $Filter,
                false,
                $Select,
                false
            );

		$result = [];
		while($ob = $res->GetNextElement())
		{
			$result[] = $ob->GetFields();
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Main_Or_Detail_Page($url)
{
	$this_url = $_SERVER['REQUEST_URI'];
	$bool = (
		($this_url == "/$url/") || 
		(strpos($this_url, "$url/?") != false)
	);
	return $bool;
}

//$phone = +73832132520 ---> 8 (383) <b>213 25 20</b>
function Phone_Converter($phone,$delimeter)
{
	$result = '';
	$result = '8 ('.substr($phone, 2, 3).') <b>'.
	substr($phone, 5, 3).$delimeter.
	substr($phone, 8, 2).$delimeter.
	substr($phone, 10, 2).'</b>';

	return $result;
}

function Check_Page($url_part)
{
	$this_url = $_SERVER['REQUEST_URI'];
	$bool = (strpos($this_url, $url_part) != false);
	return $bool;
}

?>