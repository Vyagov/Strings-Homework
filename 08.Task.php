<?php
/* Да се състави програма, чрез която се въвежда ред от символи
(стринг, низ).
Програмата да изведе на екрана дали въведения стринг е палиндром,
т.е. дали четен отляво-надясно и отдясно-наляво е един и същ. */

require_once 'readline.php';

do{
	$string = readline('Enter string:' . PHP_EOL);
} while(empty($string));

function stringRevers($str) {
	$arr = '';
	$len = mb_strlen($str);
	for ($i = $len - 1; $i >= 0; $i--) {
		$arr .= mb_substr($str, $i, 1);
	}
	return $arr;
}

$stringRev = stringRevers($string);

echo 'The string is';
echo $string == $stringRev ? ' palindrome.' : ' not palindrome.';