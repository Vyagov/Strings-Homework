<?php
/* Да се състави програма, чрез която се въвеждат последователно две
редици от символи без интервали.
Програмата да извежда съобщение за резултата от сравнението им по
позиции. */

require_once 'readline.php';

echo 'Enter two strings without spaces.', PHP_EOL;

$firstStr = readline("The first string is:" . PHP_EOL);
$secondStr = readline("The second string is:" . PHP_EOL);

$firstLen = mb_strlen($firstStr);
$secondLen = mb_strlen($secondStr);

if ($firstLen == $secondLen) {
	echo "The two strings are with equal length." . PHP_EOL;
	
	if ($firstStr == $secondStr) {
		die('The strings have the same content.');	
	}
} else {
	echo 'The two strings are with different length.', PHP_EOL;
}

echo 'Difference by positions:' . PHP_EOL;

function stringToArray($str) {
	$len = mb_strlen($str);
	for ($i = 0; $i < $len; $i++) {
		$arr[] = mb_substr($str, $i, 1);
	}
	return $arr;
}

$start = $firstLen <= $secondLen ? $firstLen : $secondLen;

$firstArr = stringToArray($firstStr);
$secondArr = stringToArray($secondStr);

for ($char = 0; $char < $start; $char++) {
	
	if ($firstArr[$char] != $secondArr[$char]) {
		echo ($char + 1), " $firstArr[$char]-$secondArr[$char]", PHP_EOL;
	}
}

if ($firstLen == $secondLen) {
	die;
}

$end = $firstLen < $secondLen ? $secondLen : $firstLen;

for ($char = $start; $char < $end; $char++) {
	echo ($char + 1);
	// Print '~' when there is no char in this position in the string.
	echo $firstLen > $secondLen ? " $firstArr[$char]-~" : " ~-$secondArr[$char]";
	echo PHP_EOL;
}
