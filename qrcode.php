
<?php
include ("vendor/autoload.php");



echo '<img src="'.(new \chillerlan\QRCode\QRCode())->render($data).'"   width="320" height="205" />';

?>