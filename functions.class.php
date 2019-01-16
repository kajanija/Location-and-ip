<?php

require "dom/vendor/autoload.php";
use Wa72\HtmlPageDom\HtmlPage;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
class nedim{
	public function location(){

		$url = 'https://www.whatismybrowser.com/detect/ip-address-location';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);
$dom = new HtmlPage($data);

$a = $dom->filter('.detected_result>.value');
foreach ($a as $key) {
	$msg=$key->nodeValue."<br>";
}
$this->location=$msg;
$exp=explode(",", $msg);
$city=$exp[0];
$this->city=$city;
$country=$exp[1];
$this->country=$country;


	}
	public function ip(){
		$url = 'https://www.whatismybrowser.com/detect/ip-address-location';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);
$dom = new HtmlPage($data);

$a = $dom->filter('p>strong');
foreach ($a as $key) {
	$msg=$key->nodeValue."<br>";
}
$ip=$msg;
$this->ip=$ip;
	}


	





















}


?>