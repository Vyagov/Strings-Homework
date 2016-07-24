<?php
/* Да се състави програма, която чете набор от думи разделени с интервал.
Като резултат да се извеждат броя на въведените думи, както и броя
знаци в най-дългата дума. */

require_once 'readline.php';

do {
	$string = readline('Enter a few words separated by space:' . PHP_EOL);
} while (empty($string));

function stringToArray($str) {
	$len = mb_strlen($str);
	for ($i = 0; $i < $len; $i++) {
		$arr[] = mb_substr($str, $i, 1);
	}
	return $arr;
}

$array = stringToArray($string);
$len = count($array);
$charCount = 0;
$maxCount = 0;
$wordCount = 0;

for ($i = 0; $i < $len; $i++) {

	if ($array[$i] != ' ') {

		if ($charCount == 0) {
			$wordCount++;
		}
		$charCount++;
	} else {
		$charCount = 0;
	}

	if ($charCount > $maxCount) {
		$maxCount = $charCount;
	}

}

echo "The string has $wordCount words, the longest is $maxCount chars.";
