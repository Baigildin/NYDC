<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?$i = ceil(count($arResult)/2);
?>
<ul>
	<?foreach($arResult as $key => $arItem):
	$link = substr($arItem['LINK'], 4);
	$arItem['LINK'] = '/en/uslugi-i-tseny/'.$link.'/';
	if($key==$i) break;
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
	?>
	<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endforeach?>
</ul>
<ul>
	<?foreach($arResult as $key => $arItem):
	$link = substr($arItem['LINK'], 4);
	$arItem['LINK'] = '/en/uslugi-i-tseny/'.$link.'/';
	if($key<$i) continue;
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
	?>
	<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endforeach?>
</ul>
<?endif?>
<?//echo"<pre>";print_r($arResult);echo"</pre>";?>