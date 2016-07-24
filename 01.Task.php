<?php
/* Да се състави програма, чрез която се въвеждат два низа съдържащи
до 40 главни и малки букви.
Като резултат на екрана да се извеждат низовете само с главни и само
с малки букви. */

require_once 'readline.php';

do {
	$firstStr = readline("Enter first string:" . PHP_EOL);
} while (mb_strlen($firstStr) > 40);

do {
	$secondStr = readline("Enter second string:" . PHP_EOL);
} while (mb_strlen($secondStr) > 40);

echo mb_strtoupper($firstStr) . ' ' . mb_strtolower($firstStr), PHP_EOL;
echo mb_strtoupper($secondStr) . ' ' . mb_strtolower($secondStr);
