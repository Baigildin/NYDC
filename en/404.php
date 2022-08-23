<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");?>
<div class="not-found">
	<div class="container">
		<h1>Error 404</h1>
		<p>Page not found</p>
	</div>
</div>
<?//echo"<pre>";print_r($_SERVER);echo"</pre>";?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>