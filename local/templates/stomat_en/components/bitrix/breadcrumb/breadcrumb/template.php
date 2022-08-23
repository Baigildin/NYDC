<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()

$strReturn .= '<div class="breadcrumb"><div class="container"><ul>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
		<li><a href="'.$arResult[$index]["LINK"].'">'.$title.'</a></li>';
	}
	else
	{
		$strReturn .= '
			<li><a href="'.$arResult[$index]["LINK"].'">'.$title.'</a></li>';
	}
}

$strReturn .= '</ul></div></div>';

return $strReturn;
