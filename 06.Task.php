<?php
/* Да се състави програма, чрез която се въвежда изречение с отделни
думи.
Като резултат на екрана да се извежда същия текст, но всяка отделна
дума да започва с главна буква, а следващите я букви да са малки. */

require_once 'readline.php';

do {
	$sentence = readline('Enter sentence of separate words:' . PHP_EOL);
} while (empty($sentence));

function stringToArray($str) {
	$len = mb_strlen($str);
	for ($i = 0; $i < $len; $i++) {
		$arr[] = mb_substr($str, $i, 1);
	}
	return $arr;
}

$sentence = stringToArray($sentence);
$firstLetter = false;
$len = count($sentence);
$result = '';

for ($i = 0; $i < $len; $i++) {
	
	if ($sentence[$i] == ' ') {
		$result .= $sentence[$i];
		$firstLetter = false;
	} else {
		if ($firstLetter) {
			$result .= mb_strtolower($sentence[$i]);
		} else {
			$result .= mb_strtoupper($sentence[$i]);
			$firstLetter = true;
		}
	}
}

echo $result;
