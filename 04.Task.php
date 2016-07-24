<?php
/* Да се състави програма, чрез която по въведени трите имена на двама
човека разделени със запетая, се извежда чие име има по-голям сбор
от ASCII кодовете на съставящите името букви. */

require_once 'readline.php';

do {
	$string = readline("Enter three names of two people separated by a ',':" . PHP_EOL);
} while(empty($string));

$stringArr = explode(',', $string);

if (!array_key_exists(1, $stringArr)) {
	echo "You have entered the name of only one person!\nInput ',' between the names!", PHP_EOL;
	die($string);
}

if (array_key_exists(2, $stringArr)) {
	die("You entered too many names separated by ','!");
}

function removeSign($str) {
	$str = trim($str);
	$signs = ['.', '-', ';', ':', '!', '?'];
	$replace = array_fill(0, count($signs), '');
	$str = str_replace($signs, $replace, $str);

	return $str;
}

function removeSpace($str) {
	$signs = [' '];
	$replace = array_fill(0, count($signs), '');
	$str = str_replace($signs, $replace, $str);

	return $str;
}

function sumCharToASCII($str) {
	$len = mb_strlen($str);
	$sum = 0;
	
	for ($i = 0; $i < $len; $i++) {
		// For more information about ISO 8859-5 - https://en.wikipedia.org/wiki/ISO/IEC_8859-5
		$char = mb_convert_encoding(mb_substr($str, $i, 1), 'ISO-8859-5');
		$sum += ord($char);
	}
	
	return $sum;
}

$firstName = removeSign($stringArr[0]);
$secondName = removeSign($stringArr[1]);

$fnASCIISum = sumCharToASCII(removeSpace($firstName));
$snASCIISum = sumCharToASCII(removeSpace($secondName));

if ($fnASCIISum == $snASCIISum) {
	echo 'The two names have equal sums.', PHP_EOL;
	echo $firstName, PHP_EOL, $secondName, PHP_EOL;
} else {
	echo 'The name with bigger sum is:', PHP_EOL;
	echo $fnASCIISum > $snASCIISum ? $firstName : $secondName;
}
