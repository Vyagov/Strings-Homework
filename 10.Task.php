<?php
/* Да се състави програма, която по даден низ връща друг,
символите, на който са получени като към всеки код на символ от               
ASCII таблицата е добавеното числото 5 и е записан новополучения символ. */

require_once 'readline.php';

// The program works with English and Cyrillic.

do {
	$string = readline('Enter some string:' . PHP_EOL);
} while (empty($string));

	
$len = mb_strlen($string);
$asciiToChar = '';

for ($i = 0; $i < $len; $i++) {
	$char = mb_substr($string, $i, 1);
	$charToASCII = 5 + ord(mb_convert_encoding($char, 'ISO-8859-5', 'UTF-8'));
	$asciiToChar .= mb_convert_encoding(pack('c', $charToASCII), 'UTF-8', 'ISO-8859-5');
}

// For more information about ISO 8859-5 - https://en.wikipedia.org/wiki/ISO/IEC_8859-5
echo $asciiToChar;
